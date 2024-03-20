{{-- Menu --}}


<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4 " data-menu-vertical="1" data-menu-scroll="1"
         data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav ">

          
            <li id ="dashboard" class="menu-item @if(isset($menu['dashboard'])) menu-item-open menu-item-here @endif" menu-item-submenu aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon flaticon-home-1"></i>
                    <span class="menu-text">Dashboard</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu "><i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li  class="menu-item  menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link">
                                                    <span class="menu-text">Dashboard</span>
                                                </span>
                        </li>

                        
                        <li class="menu-item @if(isset($menu['dashboard']['visit-places'])) menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ adminUrl('visit-places') }}" class="menu-link ">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">ვიზიტის ადგილი</span>
                            </a>
                        </li>

                        <li class="menu-item @if(isset($menu['dashboard']['visit-types'])) menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ adminUrl('visit-types') }}" class="menu-link ">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">ვიზიტის ტიპი</span>
                            </a>
                        </li>

                        <li class="menu-item @if(isset($menu['dashboard']['visit-states'])) menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ adminUrl('visit-states') }}" class="menu-link ">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">ვიზიტის მდგომარეობა</span>
                            </a>
                        </li>

                        <li class="menu-item @if(isset($menu['dashboard']['stocks'])) menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ adminUrl('stocks') }}" class="menu-link ">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">საწყობები</span>
                            </a>
                        </li>

                        <li class="menu-item @if(isset($menu['dashboard']['product-types'])) menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ adminUrl('product-types') }}" class="menu-link ">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">საქონლის ტიპები</span>
                            </a>
                        </li> 
                        
                        <li class="menu-item @if(isset($menu['dashboard']['unit-types'])) menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ adminUrl('unit-types') }}" class="menu-link ">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">საქონლის ერთეულები</span>
                            </a>
                        </li>

                        <li class="menu-item @if(isset($menu['dashboard']['providers'])) menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ adminUrl('providers') }}" class="menu-link ">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">ორგანიზაციები</span>
                            </a>
                        </li>

                        <li class="menu-item @if(isset($menu['dashboard']['products'])) menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ adminUrl('products') }}" class="menu-link ">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">პროდუქტები </span>
                            </a>
                        </li>

                        
                        <li class="menu-item @if(isset($menu['dashboard']['donors'])) menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ adminUrl('donors') }}" class="menu-link ">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">დონორები </span>
                            </a>
                        </li>

                                                
                        <li class="menu-item @if(isset($menu['dashboard']['client_cities'])) menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ adminUrl('client_cities') }}" class="menu-link ">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">ქალაქები</span>
                            </a>
                        </li>

                        <li class="menu-item @if(isset($menu['dashboard']['procedure_groups'])) menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ adminUrl('procedure_groups') }}" class="menu-link ">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">პროცედურების ჯგუფები</span>
                            </a>
                        </li>

                        
                        <li class="menu-item @if(isset($menu['dashboard']['procedure_types'])) menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ adminUrl('procedure_types') }}" class="menu-link ">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">პროცედურების ტიპები</span>
                            </a>
                        </li>

                        <li class="menu-item @if(isset($menu['dashboard']['procedures'])) menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ adminUrl('procedures') }}" class="menu-link ">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">პროცედურები</span>
                            </a>
                        </li>



                    </ul>
                </div>
            </li>

            @canany(['author:view', 'playlist:view', 'video:view', 'reel:view', 'platform:view', 'account:view', 'comment:view'])
                <li id ="general" class="menu-item @if(isset($menu['general'])) menu-item-open menu-item-here @endif" menu-item-submenu aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon fa fa-layer-group"></i>
                        <span class="menu-text">General</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu "><i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li  class="menu-item  menu-item-parent" aria-haspopup="true">
                                                    <span class="menu-link">
                                                        <span class="menu-text">General</span>
                                                    </span>
                            </li>

                            

                        </ul>
                    </div>
                </li>
            @endcan

            @can('log:view')

                <li  id ="logs" class="menu-item @if(isset($menu['logs'])) menu-item-open menu-item-here @endif" menu-item-submenu aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-search"></i>
                        <span class="menu-text">Logs</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu "><i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li  class="menu-item  menu-item-parent" aria-haspopup="true">
                                                    <span class="menu-link">
                                                        <span class="menu-text">Logs</span>
                                                    </span>
                            </li>

                                @role('Admin')
                                    <li class="menu-item @if(isset($menu['logs']['log-news'])) menu-item-here @endif" aria-haspopup="true">
                                        <a href="{{ adminUrl('log-news') }}" class="menu-link">
                                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                        <span class="menu-text">Modal News</span>
                                        </a>
                                    </li>
                                @endrole

                                <li class="menu-item @if(isset($menu['logs']['logs'])) menu-item-here @endif" aria-haspopup="true">
                                    <a href="{{ adminUrl('logs') }}" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                    <span class="menu-text">Actions</span>
                                    </a>
                                </li>
                                
                        </ul>
                    </div>
                </li>
            @endcan 
            @can('log:view')

                <li id ="ip-logs" class="menu-item @if(isset($menu['ip-logs'])) menu-item-open menu-item-here @endif" menu-item-submenu aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-ip"></i>
                        <span class="menu-text">IPs</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu "><i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li  class="menu-item  menu-item-parent" aria-haspopup="true">
                                                    <span class="menu-link">
                                                        <span class="menu-text">IPs</span>
                                                    </span>
                            </li>
                                
                            <li class="menu-item @if(isset($menu['ip-logs']['group-log-ip'])) menu-item-here @endif" aria-haspopup="true">
                                <a href="{{ adminUrl('group-log-ip/ip') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                    <span class="menu-text">Group IPs</span>
                                </a>
                            </li>
                    

                            <li class="menu-item @if(isset($menu['ip-logs']['date-group-log-ip'])) menu-item-here @endif" aria-haspopup="true">
                                <a href="{{ adminUrl('group-log-ip/date') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                    <span class="menu-text">Group Date IPs</span>
                                </a>
                            </li>

                            <li class="menu-item @if(isset($menu['ip-logs']['excluded-ips'])) menu-item-here @endif" aria-haspopup="true">
                                <a href="{{ adminUrl('excluded-ips') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                    <span class="menu-text">Excluded IPs</span>
                                </a>
                            </li>
                        
                            <li class="menu-item @if(isset($menu['ip-logs']['excluded-ip-requests'])) menu-item-here @endif" aria-haspopup="true">
                                <a href="{{ adminUrl('ip-requests') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                    <span class="menu-text">Excluded IP Requests</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>
            @endcan

            @can('log:view')

                <li  id ="ua-logs" class="menu-item @if(isset($menu['ua-logs'])) menu-item-open menu-item-here @endif" menu-item-submenu aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <i class="menu-icon flaticon-browser"></i>
                        <span class="menu-text">User Agents</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu "><i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li  class="menu-item  menu-item-parent" aria-haspopup="true">
                                                    <span class="menu-link">
                                                        <span class="menu-text">User Agents</span>
                                                    </span>
                            </li>
                                <li class="menu-item @if(isset($menu['ua-logs']['group-log-ua'])) menu-item-here @endif" aria-haspopup="true">
                                    <a href="{{ adminUrl('group-log-ua/ua') }}" class="menu-link ">
                                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                        <span class="menu-text">Group User Agents</span>
                                    </a>
                                </li>
                        
                                <li class="menu-item @if(isset($menu['ua-logs']['date-group-log-ua'])) menu-item-here @endif" aria-haspopup="true">
                                    <a href="{{ adminUrl('group-log-ua/date') }}" class="menu-link ">
                                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                        <span class="menu-text">Group Date User Agents</span>
                                    </a>
                                </li>
                    
                                <li class="menu-item @if(isset($menu['ua-logs']['excluded-user-agents'])) menu-item-here @endif" aria-haspopup="true">
                                    <a href="{{ adminUrl('excluded-user-agents') }}" class="menu-link ">
                                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                        <span class="menu-text">Excluded User Agents</span>
                                    </a>
                                </li>
                            
                                <li class="menu-item @if(isset($menu['ua-logs']['excluded-user-agent-requests'])) menu-item-here @endif" aria-haspopup="true">
                                    <a href="{{ adminUrl('excluded-user-agent-requests') }}" class="menu-link ">
                                        <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                        <span class="menu-text">Excluded User Agent Requests</span>
                                    </a>
                                </li>
                            

                        </ul>
                    </div>
                </li>
            @endcan
          
             @canany(['user:view', 'role:view', 'permission:view','project:view' ])
                <li id="settings" class="menu-item @if(isset($menu['Settings'])) menu-item-open menu-item-here @endif" menu-item-submenu aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-cogwheel-2"></i>
                    <span class="menu-text">Settings</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu "><i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item  menu-item-parent" aria-haspopup="true">
                                                <span class="menu-link">
                                                    <span class="menu-text">Settings</span>
                                                </span>
                        </li>

                        @role('Admin')
                            <li class="menu-item @if(isset($menu['Settings']['modal-news'])) menu-item-here @endif" aria-haspopup="true">
                                <a href="{{ adminUrl('modal-news') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">Modal News</span>
                                </a>
                            </li>
                        @endrole

                        @can('parameter:view')
                            <li class="menu-item @if(isset($menu['Settings']['Parameters'])) menu-item-here @endif" aria-haspopup="true">
                                <a href="{{ adminUrl('parameters') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                    {{-- flaticon2-console --}}
                                    <span class="menu-text">Parameters</span>
                                </a>
                            </li>
                        @endcan
                        
                        @can('user:view')
                        <li class="menu-item @if(isset($menu['Settings']['Users'])) menu-item-here @endif" aria-haspopup="true">
                            <a href="{{ adminUrl('users') }}" class="menu-link ">
                                <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                <span class="menu-text">Users</span>
                            </a>
                        </li>
                        @endcan
                    
                        @can('role:view')
                            <li class="menu-item @if(isset($menu['Settings']['Roles'])) menu-item-here @endif" aria-haspopup="true">
                                <a href="{{ adminUrl('roles') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                    {{-- flaticon2-console --}}
                                    <span class="menu-text">Roles</span>
                                </a>
                            </li>
                        @endcan

                        @can('permission:view')
                            <li class="menu-item @if(isset($menu['Settings']['Permission'])) menu-item-here @endif" aria-haspopup="true">
                                <a href="{{ adminUrl('permissions') }}" class="menu-link ">
                                    <i class="menu-bullet menu-bullet-dot"><span></span></i>
                                    {{-- flaticon2-console --}}
                                    <span class="menu-text">Permissions</span>
                                </a>
                            </li>
                        @endcan

                        </li>
                    </ul>
                </div>
                </li>
            @endcanany



        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>
<script>
    let menu_id = 0;
    $(".menu-toggle").click(function(element) {
        let parent = element.currentTarget.parentElement
        if(menu_id != parent.id){
            parent.classList.remove('menu-item-open')
            $("[menu-item-submenu]").removeClass("menu-item-open");
            menu_id = parent.id;
        }
    });
</script>
