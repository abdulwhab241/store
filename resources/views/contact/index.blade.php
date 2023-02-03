@extends('layout')
@section('title', 'اتصل بنا')
@section('Page')

<section class="blog-banner-area" id="contact">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1>اتصل بنا</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">اتصل بنا</li>
        </ol>
        </nav>
            </div>
        </div>
</div>
</section>
<section style="margin-top: 10px; margin-bottom: 10px;">
@if (Session::has('message'))
<div class="alert alert-info">
    <span style="text-align: center; font-weight: bold;"><h4 style="text-align: center font-weight: bold;">{{Session::get('message')}}</h4>  </span>
</div>
@endif
<div class="col-md-12 col-lg-12">
    <form action="{{ route('submit') }}" class="contact_form" method="POST" enctype="multipart/form-data" id="contactForm" novalidate="novalidate">
    @csrf
    <div class="row">
        <div class="col-lg-5">
        <div class="form-group">
            <input class="form-control" name="name"  value="{{ old('name') }}" id="name" type="text" placeholder="ادخل اسمك">
            <div style="margin-top: 20px;">
            @error('name')
            <span class="alert alert-danger">
            الاسم فارغ الرجاء إدخال الاسم
            </span>
            @enderror
            </div>
        </div>
        <div class="form-group">
            <input class="form-control" name="email" value="{{ old('email') }}" id="email" type="email" placeholder="عنوان البريد الإلكتروني ">
            <div style="margin-top: 20px;">
            @error('email')
            <span class="alert alert-danger">
            الإيميل فارغ الرجاء إدخال الإيميل
            </span>
            @enderror
            </div>
        </div>
        <div class="form-group">
            <input class="form-control" name="mobile" value="{{ old('mobile') }}" id="mobile" type="text" placeholder="رقم الهاتف">
            <div style="margin-top: 20px;">
            @error('mobile')
            <span class="alert alert-danger">
            لابد من كتابة ارقام وليس حروف !
            </span>
            @enderror
            </div>
        </div>
        <div class="form-group">
            <input class="form-control" name="title" value="{{ old('title') }}" id="title" type="text" placeholder="الموضوع">
            <div style="margin-top: 20px;">
            @error('title')
            <span class="alert alert-danger">
            الموضوع فارغ الرجاء إدخال الموضوع
            </span>
            @enderror
            </div>
        </div>
        </div>
        <div class="col-lg-7">
        <div class="form-group">
            <textarea class="form-control different-control w-100" name="content" id="content" cols="30" rows="5" placeholder="ادخل الرسالة">{{ old('content') }}</textarea>
            <div style="margin-top: 20px;">
            @error('content')
            <span class="alert alert-danger">
                الرساله فارغة الرجاء إدخال الرساله
            </span>
            @enderror
            </div>
        </div>
        </div>
    </div>
    <div class="form-group text-center text-md-right mt-3">
        <button type="submit" class="button button--active button-info">إرسال</button>
    </div>
    </form>
</div>
</section>


@endsection