class View {
    UFData;
    constructor(fields, dealId) {
        this.fields = [];
        this.dealId = dealId;
        if(fields != null && typeof fields != "undefined" && fields.trim().length !== 0)
        {
            JSON.parse(fields).forEach((element) => {
                for(let name in element){
                    this.fields[name] = element[name];
                }
            })
        }
    }
    async run()
    {

        let data = await this.getDealInfoData();
        let UFValues = this.parseUserFieldsFromDealData(data);
        this.setUFData(UFValues);
        this.renderFields();

    }
    async getDealInfoData()
    {
        return new Promise((resolve, reject) => {
            try {
                BX24.callMethod(
                    "crm.deal.get",
                    {
                        ID: this.dealId
                    },
                    function(result){
                        resolve(result);
                    }
                );
            } catch (err) {
                return reject(err);
            }
        });
    }
    parseUserFieldsFromDealData(result){
        let UFValues = [];
        let obj = result['answer']['result'];
        for (let item in obj) {
            if(obj.hasOwnProperty(item)) {
                if(this.fields[item]){
                    UFValues[item] = obj[item];
                }
            }
        }
        return UFValues;
    }
    setUFData(UFData)
    {
        this.UFData = UFData;
    }
    renderFields(){
        let text = '<b>Заполнить следующие поля:</b><br><br>';
        let count = 0;
        for(let name in this.UFData){
            count++;
            if(this.UFData[name] == false){
                text += count + '. ' + this.fields[name] + '<br>';
            } else {
                text += '<s>' + count + '. ' + this.fields[name] + '</s><br>';
            }
        }
        document.getElementById('checklist').innerHTML = text;
    }
}