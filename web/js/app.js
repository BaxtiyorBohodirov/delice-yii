console.log("hello");
$(function(){
    $('#image').change(ev=>{
        console.log($('#labelForImage').text()+" "+$(ev.target).val());
        $('#labelForImage').text( $(ev.target).val().split('\\').pop());
    })
});
$(document).ready(function(){
    $("#formContact").on('beforeSubmit',function(ev){
          
        console.log($(this).serializeArray());
            $.ajax({
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:$(this).serializeArray()
        }).done(function(data){
            if(data.error==null)
            {
                alert("Saqlandi");
                $('#formContact')[0].reset();
            }
            else{
                alert("Saqlanmadi");
            }
        }).fail(function(){
                alert("Saqlanmadi");
        })
        return false;
        });
    $('.card-about-menu-link').on('click',function(ev){
        $.ajax({
            type:'post',
            url:"/site/get-product-detail?id="+$(this).attr('id'),
            data:$(this).serializeArray(),
        }).done(function(data){

            $('.card-about-menu-link.active').removeClass('active');
            $(ev.target).addClass('active');
            $('.card-about-text p').text(data);

        }).fail(function(){
            alert("Xatolik sodir bo'ldi!");
        })
        return false;
    });
    $('.catalog-menu-item a').on('click',function(ev)
    {
        $.ajax({
            type:'post',
            url:'/site/get-products?id='+$(this).attr('id'),
            data:$(this).serializeArray(),
        }).done(function(data1){
            $('.catalog-menu-item a.active').removeClass('active');
            $(ev.target).addClass('active');
            var s="";
            for(let item of data1.data)
            {
                s+="<div class='section-two-block-item col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12'>"+
                "<div class='section-two-block-item-img'>"+
                    "<img src='"+item.image+"' alt=''>"+
                    "<div class='section-two-block-item-img-button-div'>"+
                        "<button type='type' class='section-two-block-item-img-button'>Подробнее</button>"+
                    "</div></div>"+
                "<h6 class='section-two-block-item-title'>"+item.title_uz+"</h6>"+
                "<p class='section-two-block-item-text'>"+item.sub_content_uz+"</p>"+
                "<p class='section-two-block-item-sum'><span>"+item.price+"</span>сум</p>"+
            "</div>";
            }
            $('.section-two-block.row').html(s);
          
        }).fail(function()
        {
            console.log("Xatolik sodir bo'ldi");
        });

        return false;
    });
    $('.section-two-menu-item a').on('click',function(ev)
    {
        alert($(this).attr('href'));
        $.ajax({
            type:'post',
            url:'/site/get-products?id='+$(this).attr('id'),
            data:$(this).serializeArray(),
        }).done(function(data1){
            console.log(data1.data);
            var s="";
            for(let item of data1.data)
            {
                s+="<div class='section-two-block-item col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12'>"+
                "<div class='section-two-block-item-img'>"+
                    "<img src='"+item.image+"' alt=''>"+
                    "<div class='section-two-block-item-img-button-div'>"+
                        "<button type='type' class='section-two-block-item-img-button'>Подробнее</button>"+
                    "</div></div>"+
                "<h6 class='section-two-block-item-title'>"+item.title_uz+"</h6>"+
                "<p class='section-two-block-item-text'>"+item.sub_content_uz+"</p>"+
                "<p class='section-two-block-item-sum'><span>"+item.price+"</span>сум</p>"+
            "</div>";
            }
            $('.section-two-block.row').html(s);
        }).fail(function()
        {
            console.log("Xatolik sodir bo'ldi");
        });
        return false;
    });
});