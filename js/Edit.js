class Edit {
    _fields;
    _currentField;
    constructor(fields, currentField) {
        if(fields != null && typeof fields != "undefined" && fields.trim().length !== 0)
            this._fields = JSON.parse(fields);
        else
            this._fields = [];
        this._currentField = currentField;
    }
    setValue(options) {
        let settingOptions = [];
        options.forEach(element => {
            let value = '"' + element.value + '"';
            settingOptions.push({[value]:element.label});
        });
        console.log(settingOptions);
        BX24.placement.call('setValue', JSON.stringify(settingOptions));
    }
    async run()
    {
        let result = await this.getDealFields();
        let select = document.querySelector("#fields");
        select.addEventListener("change", (e) => {
            this.setValue([...select.options].filter((x) => x.selected))
        })
        this.renderFields(result.answer.result)
    }
    async getDealFields()
    {
        return new Promise(function(resolve, reject) {
            try {
                BX24.callMethod(
                    "crm.deal.fields",
                    {},
                    function(result) {
                        resolve(result);
                    }
                );
            } catch (err) {
                reject(err);
            }
        });
    }
    renderFields(fields)
    {
        for (let fieldName in fields)
        {
            if (fieldName.indexOf(this._currentField) === -1
                && fields[fieldName]["formLabel"]
                && fields[fieldName]["title"] ){
                let option = document.createElement('option');
                option.setAttribute("value", fields[fieldName]["title"]);
                this._fields.forEach(function(element){
                    if(element[fieldName]){
                        option.setAttribute("selected", "selected");
                    }
                })
                option.innerHTML = fields[fieldName]["formLabel"];
                let element = document.getElementById("fields");
                element.append(option);
            }
        }

    }
}