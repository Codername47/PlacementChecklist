var editor = {
	run: async function(){
		var list = await getList();
		var text = '';
		console.log(fields);
		list.forEach(function (element, index){
			if((fields[element] == false) || (fields[element] === null) || (typeof(fields[element]) == "undefined")){
				text += "<label><input type=\"checkbox\" id=\"checkbox_" + index + "\" onclick=\"handleClick(this);\">" + element + "</label> ";
			} else {
				text += "<label><input type=\"checkbox\" id=\"checkbox_" + index + "\" checked>" + element + "</label>";
			}
			text += '<br>';
		})
		document.getElementById('checkbox-area').innerHTML = text;
	}
}

async function handleClick() {
	var list = await getList();
	options = [];
    list.forEach(function (element, index){ 
        value = document.getElementById('checkbox_' + index).checked;
        options.push({[element]:value});
    });
    BX24.placement.call('setValue', JSON.stringify(options));
}

BX24.ready(function()
{
    BX24.init(function()
    {
        BX24.resizeWindow(document.body.clientWidth,
            document.getElementsByClassName("workarea")[0].clientHeight);
		editor.run();
    })
})
