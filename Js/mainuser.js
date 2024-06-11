const img_usera=document.querySelector('.img_user');
var ismenu = false;
img_usera.addEventListener('click',() => {
    var caption = document.querySelector('.menu_user');
 
    if(ismenu){
        caption.style.display = 'block';
        ismenu = false;
    }
    else{
        caption.style.display = 'none';
        ismenu = true;
    }
});

const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

// const tabs = $$('#myList a');
// //const panels = $$('.contains_item');

// tabs.forEach(function (tab, index){
// //    const pane = panels[index];
//     tab.addEventListener('click', function(event)
//     {
//        // event.preventDefault();
//     })
//     tab.onclick = function(){
//        otab =  $("#myList .active");
//       // opanel = $(".contains_item.active");
//         otab.classList.remove("active")
//        // opanel.classList.remove("active");

//        tab.classList.add("active");
//        // pane.classList.add("active");
//     }
// })






//  Lấy tất cả các phần tử a
 const links = document.querySelectorAll('.myLink');
  
 //Thêm sự kiện click vào từng phần tử a
 links.forEach(link => {
   link.addEventListener('click', function(event) {
     // Ngăn chặn hành động mặc định của phần tử a
     event.preventDefault();
     // Lấy đường dẫn của file PHP tương ứng
     const target = this.getAttribute('data-target');
    //  console.log(target);
     // Lấy nội dung của file PHP tương ứng bằng phương thức fetch()
     fetch(target)
       .then(response => response.text())
       .then(data => {
        // Gán nội dung của file PHP vào phần tử HTML
        console.log(data);
         const content = document.getElementById('br_second');
         content.innerHTML = data;
           var test= document.getElementById('back');
           test.addEventListener('click',()=>{
                window.history.back();
           });
       });
   });
 });

 var linksroom = document.querySelectorAll(".myLink");
 for (var i = 0; i < linksroom.length; i++) {
     linksroom[i].addEventListener("click", function() {
         // Xóa lớp active của các thẻ <a> khác
         for (var j = 0; j < linksroom.length; j++) {
             linksroom[j].classList.remove("active");
         }
 
         // Gán lớp active cho thẻ <a> được nhấp chuột
         this.classList.add("active");
     });
 }


// const fileInputRoom = document.getElementById('myFileInputRoom');
// const imageRoom = document.getElementById('myImageRoom');
// fileInputRoom.addEventListener('change', function() {
//     // Lấy tệp hình ảnh đã chọn
//     const fileRoom = fileInputRoom.files[0];
    
//     // Hiển thị hình ảnh
//     const readerRoom = new FileReader();
//     readerRoom.readAsDataURL(fileRoom);
//     readerRoom.onload = function () {
//       imageRoom.src = readerRoom.result;
//     };
// });
const my_menu=document.getElementById('my_menu');
var ismenu1 = true;
my_menu.addEventListener('click',() => {
    var caption = document.getElementById('nav_menuroo');
 
    if(ismenu1){
        caption.style.display = 'block';
        ismenu1 = false;
    }
    else{
        caption.style.display = 'none';
        ismenu1 = true;
    }
});        