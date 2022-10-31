var checker = {
	run: async function(){
		list = await getList();
		let count = 0;
		let text = '';
		list.forEach(element => {
			count++;
			if((fields[element] == false) || (fields[element] === null) || (typeof(fields[element]) == "undefined")){
				text += count + '. ' + element + '<br>';
			} else {
				text += '<s>' + count + '. ' + element + '</s><br>';
			}
		})
		document.getElementById('checklist').innerHTML = text;
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
