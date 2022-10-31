var checker = {
	run: async function(){

		var getUFValuesPromise = new Promise(function(resolve, reject) {
			try {
				BX24.callMethod(
					"crm.deal.get", 
					{
						ID: entityValueId
					}, 
					function(result){
						resolve(result);
					}
				);
			} catch (err) {
				return reject(err);
			}
		});
		
		getUFValues = async function(result){
			var UFValues = [];
			var obj = result['answer']['result'];
			for (var item in obj) {
				if(obj.hasOwnProperty(item)) {
					if(fields[item]){
						UFValues[item] = obj[item];
					}
				}
			}
			return UFValues;
		}

		fieldsCheck = function(UFValues){
			var text = '<b>Заполнить следующие поля:</b><br><br>';
			var count = 0;
			for(var name in UFValues){
				count++;
				if(UFValues[name] == false){
					text += count + '. ' + fields[name] + '<br>';
				} else {
					text += '<s>' + count + '. ' + fields[name] + '</s><br>';
				}
			}
			document.getElementById('checklist').innerHTML = text;
		}

		try{
			let result = await getUFValuesPromise;
			let UFValues = await getUFValues(result);
			console.log(UFValues);
			fieldsCheck(UFValues);
		} catch(err){
			console.log(err);
		}
	}
}
BX24.ready(function()
{
    BX24.init(function()
    {
        BX24.resizeWindow(document.body.clientWidth,
            document.getElementsByClassName("workarea")[0].clientHeight);
		checker.run();
    })
})
