{{-- Content --}}
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6  subheader-solid " id="kt_subheader">
        <div
            class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">

                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    
                    <!--end::Page Title-->

                    <!--begin::Breadcrumb-->
                    <ul id="breadcrumb-desktop" class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <h5 class="text-dark font-weight-bold my-1 mr-5 page-title">
                      
                        </h5>
                        <li class="breadcrumb-item">
                            <i class="menu-icon"></i>
                        </li>

                        <li class="breadcrumb-item">
                            <a class="text-muted" href=""></a>
                        </li>

                        <li class="breadcrumb-item">
                            <a class="submenu-text-muted text-muted" href=""></a>
                        </li>

                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->

            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Actions-->
                @if(isset($buttons) && count($buttons) > 0)
                    
                        @foreach($buttons as $button)
                            @if(isset($button['url']))
                            <a {{isset($button['target']) && $button['target'] == true ? 'target="_blank"' : '' }} class="text-muted" href="{{ url($button['url']) }} "> @endif
                                <button @if (isset($button['disabled']) && $button['disabled'] ) disabled @endif style="right: 40px; margin-left:5px " class="btn btn-default btn-success" id="@if(isset($button['id'])){{$button['id']}}@endif"> {{$button['title']}}</button>
                                @if(isset($button['url'])) </a> @endif
                        @endforeach
                   
                @endif
                <!--end::Actions-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">

        @yield('content')

    </div>
    <!--end::Entry-->
    <script>
        function generateBreadcrumbs() {
            const breadcrumb =  document.querySelector(".breadcrumb");
            const currentURL = window.location.href;    
            const iconHTML = document.querySelector('.menu-item-here .menu-icon').outerHTML;
            const pageTitle = document.querySelector('.menu-item-here .menu-text').innerText;
            const linkName = document.querySelector('.menu-item-here .menu-item-here .menu-text').innerText;
            const link = document.querySelector('.menu-item-here .menu-item-here .menu-link').href;
            const submenuName = document.querySelector('.menu-item .menu-item-here .submenu')
            

            document.querySelector(".page-title").innerHTML = pageTitle;
            document.querySelector(".breadcrumb-item .menu-icon").innerHTML = iconHTML;
            document.querySelector(".breadcrumb-item .text-muted").innerText = linkName;
            document.querySelector(".breadcrumb-item .text-muted").href = link;
            if(submenuName){
               
                document.querySelector(".breadcrumb-item .submenu-text-muted").innerText = submenuName.innerText
            }

           
            if(currentURL.endsWith("/create")){
                breadcrumb.innerHTML += `<li class="breadcrumb-item">{{ env('create_new') }}</li>`;
            }else if (currentURL.endsWith("/edit")){
                breadcrumb.innerHTML += `<li class="breadcrumb-item">Edit</li>`;
            }else if (currentURL.endsWith("/show")){
                breadcrumb.innerHTML += `<li class="breadcrumb-item">Show</li>`;
            }
        }
        generateBreadcrumbs();
    </script>
</div>
