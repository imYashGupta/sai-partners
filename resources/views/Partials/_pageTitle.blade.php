@if(Route::current()->getName()!="home")
<section class="page-title" style="background-image:url(/images/background/16.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <h1>@yield("title")</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="/">Home</a></li>
                    <li>@yield("title")</li>
                </ul>
            </div>
        </div>
    </section>
@endif