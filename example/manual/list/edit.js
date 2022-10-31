var valueArray = [];
function send() {
    BX24.placement.call('setValue', JSON.stringify(valueArray));
}
function setValue(value, key)
{
    valueArray[key] = value;
    send();
}
function addField() {
    console.log('aaa');
    key = valueArray.push('') - 1;
    send();
    let div = document.createElement('div');
    div.setAttribute('id', key);
    div.innerHTML = 
        "<input type=\"text\" style=\"width: 90%;\" value=\"\" onkeyup=\"setValue(this.value, " + key + ")\">" +
        "<a onclick=deleteField(" + key + ")> X</a>";
    let element = document.getElementById("fields");
    element.append(div);
}
function deleteField(index) {
    valueArray.splice(index, 1);
    send();
    var elem = document.getElementById(index);
    elem.remove();
}