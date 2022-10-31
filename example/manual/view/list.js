getList = async function()
{
	try {
		let userFields = await getUserFieldsPromise;
		let listField = getListField(userFields['answer']['result']);
		let UFValues = await getUFValuesPromise;
		if(typeof(UFValues['answer']['result'][listField]) == "undefined" && variable === null) {
			throw 'List is undefined';
		}
		listValue = UFValues['answer']['result'][listField];
		values = JSON.parse(listValue);
	} catch(err){
		console.log(err);
	}
	return values;
}
var getUserFieldsPromise = new Promise(function(resolve, reject) {
	try {  
		BX24.callMethod(
			"crm.deal.fields", 
			{}, 
			function(result) 
			{
				resolve(result);
			}
		);
	} catch (err) {
		return reject(err);
	}
})

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

getListField = function(UFNames)
{
	let label = UFNames[currentUFName]['formLabel'] + ' поля';
	let listField;
	Object.keys(UFNames).forEach(
		function(currentValue){
			if(UFNames[currentValue]['formLabel'] === label){
				listField = currentValue;
			}
		}
	);
	return listField;

}