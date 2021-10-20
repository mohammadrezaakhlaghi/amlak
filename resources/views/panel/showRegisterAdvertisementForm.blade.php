@extends('layouts.layout')
@section('content')
        <style>
            .col-md-12{
                padding: 0px
            }

i:hover{
    cursor: pointer
}
        </style>
    </head>
    <body style="direction: rtl">
        <div class="container-fluid">
<div class="row">
 
    <form id="form" name="form" action="{{route('registerAdvertisement')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12 col-12" style="padding:10px">
            <div style="border:1px dashed gray; padding:10px">
            در این قسمت آگهی خود را با توجه به نوع که می تواند اجاره ای یا فروش باشد قرار دهید 
            <p>کافیست هر متنی که دلخواه شماست را وارد کنید و تنها به نکات ثبت قیمت و نوع در مثال آورده شده در پایین صفحه دقت نمایید</p>
        </div>
        <br>
        
            
            <textarea name="order" style="width:100%; height:300px;border:1px dashed gray;" placeholder=" متن خود را در این قسمت وارد کنید"></textarea>
        
                <i class="fa fa-send" id="send" style="font-size:24px; position:absolute; top:350px; left:90px; color:lightblue" title="جهت ارسال تصاویر اینجا کلیک کنید"></i>
                <i style="position:absolute; top:400px; right:20px; color:rgb(192, 193, 194)" title="جهت ارسال تصاویر اینجا کلیک کنید">1- نوع 
                    2- قیمت
                    </i>
                    <i style="position:absolute; top:420px; right:20px; color:rgb(192, 193, 194)" title="جهت ارسال تصاویر اینجا کلیک کنید">-   آپارتمان =اجاره ای= طبقه اول واحد 2  قیمت =200= با تمام امکانات سال ساخت 1400</i>

                    <div class="col-md-10 col-10" style="float:right"><img id="imgUpload" style="width:100px; height:100px; display: none"></div>
                        <label for="upload" id="btnAttach" title="انتخاب تصویر">
                            <i class="fa fa-share"  style="font-size:24px; position:absolute; top:350px; left:40px; color:lightblue" title="جهت ارسال تصاویر اینجا کلیک کنید"></i>
                            <input type="file" name="file" id="upload"  style="display:none">
            </div>
        </form>
    </div>
    
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    		<script type="text/javascript">
    $(document).ready(function() {
    $("#upload").change(function(e) {

    for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
        var file = e.originalEvent.srcElement.files[i];

       
        
        var reader = new FileReader();
        reader.onloadend = function() {
			$("#imgUpload").css({'display':'block'});
			$("#imgUpload").attr("src", reader.result);
           imageSelected=true;
        }
        reader.readAsDataURL(file);
        $("#upload").after(img);
    }
});
    });
    $('#send').on('click', function(){
        document.getElementById("form").submit();    
        });
</script>
@endsection