@extends("frontend.layout_trang_chu")
@section("append-du-lieu")
<div class="row" style="display: flex; margin-top: 30px">
    <div class="col-lg-6">
        {{-- google map --}}
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8346096347605!2d105.77081187387658!3d21.039302687419056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454b5534fb3bf%3A0x70d71b071349fa94!2sDevPro%20Education!5e0!3m2!1svi!2s!4v1704338360788!5m2!1svi!2s" style="border:0; width: 600px; height: 400px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="col-lg-6">
        <div style="">
            {{-- google form --}}
                <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScSOrQmoHLFftB_J5BQQuiJp7ENaZMq9SdOAxV44Av8ySs0dQ/viewform?embedded=true" style="width: 600px; height: 400px;" frameborder="0" marginheight="0" marginwidth="0">Đang tải…</iframe>
            {{-- google form --}}
        </div>
    </div>
</div>
@endsection