function logout() {
        document.getElementById('logout').submit();
}
//gọi phương thức get
function get(path, param = {}){
    var myHeader = new Headers();
    myHeader.append("Content-Type",'application/json');
    const paramUrl = new URLSearchParams();
    return fetch(`${path}?${paramUrl}`, {
        method: 'GET',
        headers: myHeader,
    }).then(response => response.json())
}

//hiện danh sách lớp khi chọn khoa
function renderSelectGrade(e) {
    let selectGrade=document.getElementById("selectGrade")
    if(e.value != ""){
        get("/admins/admin/searchByDepartment/"+e.value).
        then(grades=>
        {
            let html = `<option value="">Chọn lớp</option>`
            for (const grade of grades) {
                html+=`<option value="${grade.id}">${grade.name}</option>`
                selectGrade.innerHTML= html;
            }
        })
    }
}
//lấy link ảnh
function getLinkImg(id){
    image.src=""
    get("/getLink/"+id)
        .then(data => {
            image.src = "/images/" + data.url
        });
}

function getLinkImgPro(id){
    image.src=""
    get("/getLinkPro/"+id)
        .then(data => {
            image.src = "/images/" + data.url
        });
}
function deletee($id){
    event.preventDefault()
    const isconfirm =confirm("Xác nhận xóa!")
    if(isconfirm){
        document.getElementById('delete_'+$id).submit();
    }
}
function selectName(select){
        document.getElementById('search').name = select.value
}

function formatDate(olddate){
    const date = new Date(olddate);
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const year = date.getFullYear();

    return `${day}/${month}/${year}`;
}


