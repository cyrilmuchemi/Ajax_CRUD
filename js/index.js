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
    try {
        console.log("Response from server:", result);
        let obj = JSON.parse(result);

        if (typeof obj == 'object') {
            if (obj.data_type == 'read') {
                let tBody = document.querySelector('.js-table-body');
                let str = "";

                if (typeof obj.data == 'object') {
                    for (let i = 0; i < obj.data.length; i++) {
                        let row = obj.data[i];
                        str += `<tr><td>${row.id}</td><td>${row.name}</td><td>${row.image}</td><td>${row.email}</td><td>${row.age}</td><td>${row.city}</td><td><button class="btn btn-success btn-sm">Edit</button> <button class="btn btn-danger btn-sm">Delete</button></td></tr>`;
                    }
                } else {
                    str = "<tr><td>No records found!</td></tr>";
                }

                tBody.innerHTML = str;
            } else if (obj.data_type == 'save') {
                if (obj.error) {
                    alert("Error: " + obj.error);
                } else {
                    alert(obj.data);
                    send_data({}, 'read');
                }
            }
        }
    } catch (error) {
        console.error("Error parsing JSON:", error);
    }
}

function display_image(file)
{
    const image = document.querySelector('.js-image');
    image.src = URL.createObjectURL(file);
}

const addModal = new bootstrap.Modal('#add-new-modal', {});
const addModalBtn = document.getElementById('add-modal-button');
const myForm = document.querySelector('.add-user-form')

addModalBtn.addEventListener('click', ()=>{
    addModal.show()
});

const saveBtn = document.getElementById('save-button');

myForm.addEventListener('submit', (event)=>{
    event.preventDefault(); 
    let obj = {};
    let inputs = myForm.querySelectorAll('input, select, textarea');

    for (let i = 0; i < inputs.length; i++) {
        
        if(inputs[i].type == 'file'){
            obj[inputs[i].id] = inputs[i].files[0];
        }else{
            obj[inputs[i].id] = inputs[i].value;
        }
        
        inputs[i].value = "";
    }
        send_data(obj, 'save');
        addModal.hide();
});