function send(options) {
    settingOptions = [];
    options.forEach(element => {
        value = '"' + element.value + '"';
        settingOptions.push({[value]:element.label});
    });
    console.log(settingOptions);
    BX24.placement.call('setValue', JSON.stringify(settingOptions));
}

async function optionsList(){
    var fieldsPromise = new Promise(function(resolve, reject) {
        try {
            BX24.callMethod(
                "crm.deal.fields", 
                {}, 
                function(result) {
                    resolve(result);
                }
            );
        } catch (err) {
            return reject(err);
        }
    });
    result = await fieldsPromise;
    for(var index in result.answer.result){
        if(index.indexOf(currentField) == -1
        && result.answer.result[index]["formLabel"]
        && result.answer.result[index]["title"]){
            let option = document.createElement('option');
            option.setAttribute("value", result.answer.result[index]["title"]);
            option.setAttribute("onChange", "fieldSelect(this.selectedIndex, this.value, \"" + result.answer.result[index]["title"] + "\")");
            fields.forEach(function(element){
                if(element[index]){
                    option.setAttribute("selected", "selected");
                }
            })
            option.innerHTML = result.answer.result[index]["formLabel"];
            let element = document.getElementById("fields");
            element.append(option);
        }
    }
}