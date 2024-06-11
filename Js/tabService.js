const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

const tabs = $$('.tap_service-item');
const panels = $$('.contains_item');

tabs.forEach(function (tab, index){
    const pane = panels[index];
    tab.addEventListener('click', function(event)
    {
        event.preventDefault();
    })
    tab.onclick = function(){
       otab =  $(".tap_service-item.active");
       opanel = $(".contains_item.active");
        otab.classList.remove("active")
        opanel.classList.remove("active");

       tab.classList.add("active");
        pane.classList.add("active");
    }
})
