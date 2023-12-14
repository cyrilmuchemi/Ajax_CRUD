send_data({}, 'read');

function send_data(obj, type) {
    let form = new FormData();

    for (let key in obj) {
        if (obj.hasOwnProperty(key)) {
            form.append(key, obj[key]);
        }
    }

    form.append('data_type', type);

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

    console.log(result);
    let obj = JSON.parse(result);

    if(typeof obj == 'object')
    {
        if(obj.data_type == 'read')
        {
            let tBody = document.querySelector('.js-table-body');
            let str = "";

            if(typeof obj.data == 'object')
            {
                for(let i = 0; i < obj.data.length; i++){

                    let row = obj.data[i];
                    str += `<tr><td>${row.id}</td><td>${row.name}</td><td>${row.image}</td><td>${row.email}</td><td>${row.age}</td><td>${row.city}</td></tr>`;
                }
              
            }else{
                str = "<tr><td>No records found!</td></tr>";
            }

            tBody.innerHTML = str;
        }

    }
}
