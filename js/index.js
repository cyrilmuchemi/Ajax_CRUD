send_data({}, 'read');

function send_data(obj, type) {
    let form = new FormData();

    for (let key in obj) {
        if (obj.hasOwnProperty(key)) {
            form.append(key, obj[key]);
        }
    }

    let ajax = new XMLHttpRequest();

    ajax.addEventListener('readystatechange', () => {
        if (ajax.readyState == 4) {
            if (ajax.status == 200) {
                handle_result(ajax.responseText);
            } else {
                alert("An error occurred");
            }
        }
    });

    ajax.open('post', 'api.php', true);
    ajax.send(form);
}

function handle_result(result) {
    alert(result);
}
