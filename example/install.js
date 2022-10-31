
var test = {
    call: function(method, param)
    {
        BX24.callMethod(method, param, test.debug);
    },

    debug: function(result)
    {
        var s = '';

        s += '<b>' + result.query.method + '</b>\n';
        s += JSON.stringify(result.query.data, null, '  ') + '\n\n';

        if(result.error())
        {
            s += '<span style="color: red">Error! ' + result.error().getStatus() + ': ' + result.error().toString() + '</span>\n';
        }
        else
        {
            s += '<span>' + JSON.stringify(result.data(), null, '  ') + '</span>\n';
        }

        document.getElementById('debug').innerHTML = s;
    },

    add: function(id, handler, title, description)
    {
        test.call('userfieldtype.add', {
            USER_TYPE_ID: id,
            HANDLER: handler,
            TITLE: title,
            DESCRIPTION: description
        });
    },

    del: function(id)
    {
        test.call('userfieldtype.delete', {
            USER_TYPE_ID: id
        });
    }
}