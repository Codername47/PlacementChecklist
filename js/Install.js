class Install {
    call(method, param)
    {
        BX24.callMethod(method, param, this.debug);
    }
    debug()
    {
        let s = '';

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
    }

    add(id, handler, title, description)
    {
        this.call('userfieldtype.add', {
            USER_TYPE_ID: id,
            HANDLER: handler,
            TITLE: title,
            DESCRIPTION: description
        });
    }
    del(id)
    {
        this.call('userfieldtype.delete', {
            USER_TYPE_ID: id
        });
    }

}