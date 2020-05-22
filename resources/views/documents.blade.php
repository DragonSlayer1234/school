@extends('layouts.app')
@section('content')
  <div class="site-breadcrumb">
<div class="container">
  <a href="#"><i class="fa fa-home"></i> Главная</a> <i class="fa fa-angle-right"></i>
  <span>Документация</span>
</div>
</div>
<!-- Breadcrumb section end -->


<!-- About section -->
<section class="about-section spad pt-0">
<div class="container">
  <div class="section-title text-center">
    <div class="text-center my-4">
      <a href="{{route('show-teacher-document')}}" class="d-type">Для учителей</a>
      <a href="{{route('show-document')}}" class="d-type d-type-active">Нормативно-правовые акты</a>
      <a href="" class="d-type">Расписание</a>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-12">
      <div class="blog-item">
        <div class="blog-thumb set-bg" data-setbg="https://www.publicdomainpictures.net/pictures/220000/velka/open-notebook-with-blue-pen.jpg"></div>
        <div class="blog-content text-justify">
          <h4>Приказ министра образования и науки Республики Казахстан от 12 октября 2018 года № 564 «Об утверждении Типовых правил приема на обучение в организации образования, реализующие общеобразовательные учебные программы начального, основного среднего и общего с</h4>
          <div class="blog-meta">
            <span><i class="fa fa-calendar-o"></i> 23 Mar 2018</span>
          </div>
          <span><a href="#"> <i class="fas fa-download"></i> Скачать приказ</a></span>
        </div>
      </div>
    </div>
    <div class="col-xl-12">
      <div class="blog-item">
        <div class="blog-thumb set-bg" data-setbg="https://lh3.googleusercontent.com/proxy/7jsMCmXN62ovvJUg86i8-6Vd5zZKmCE9sE8YrFkPs8HJlpDKwyKgFe-FxVuLaw1mFma_bPtYWVMsR4ZqaTKXUkX4BEPmc2eR5W3c9zorSyhHpGaPk2g4P1XKztymaJg"></div>
        <div class="blog-content text-justify">
          <h4>Приказ по Концептуальным основам казахстанской системы выявления одаренных детей</h4>
          <div class="blog-meta">
            <span><i class="fa fa-calendar-o"></i> 23 Mar 2018</span>
          </div>
          <span><a href="#"> <i class="fas fa-download"></i> Скачать приказ</a></span>
        </div>
      </div>
    </div>
    <div class="col-xl-12">
      <div class="blog-item">
        <div class="blog-thumb set-bg" data-setbg="https://mobile-review.com/articles/2016/image/montblanc-augmented-paper/pic/17.jpg"></div>
        <div class="blog-content text-justify">
          <h4>Об утверждении Правил конкурсного замещении руководителей государственных учреждений среднего образования</h4>
          <div class="blog-meta">
            <span><i class="fa fa-calendar-o"></i> 23 Mar 2018</span>
          </div>
          <span><a href="#"> <i class="fas fa-download"></i> Скачать приказ</a></span>
        </div>
      </div>
    </div>
    <div class="col-xl-12">
      <div class="blog-item">
        <div class="blog-thumb set-bg" data-setbg="https://classpic.ru/wp-content/uploads/2017/01/25034/Bloknot-i-ruchka-na-klaviature-noutbuka.jpg"></div>
        <div class="blog-content text-justify">
          <h4>Нормативно-правовые документы, регулирующие учебно-воспитательный процесс в специализированных организациях образования</h4>
          <div class="blog-meta">
            <span><i class="fa fa-calendar-o"></i> 23 Mar 2018</span>
          </div>
          <span><a href="#"> <i class="fas fa-download"></i> Скачать приказ</a></span>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
@endsection
