<div id="layoutDrawer_nav">
    <!-- Drawer navigation-->
    <nav class="drawer accordion drawer-light bg-white" id="drawerAccordion">
        <div class="drawer-menu">
            <div class="nav">
                <div class="drawer-menu-heading pt-15"></div>
                <!-- Drawer link (Dashboards)-->
                <a class="nav-link {{ (request()->is('admin/general*')) ? 'active' : 'collapsed' }}" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                    <div class="nav-link-icon"><span class="material-icons">home</span></div>
                    {{ __('global.category.general') }}
                    <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                </a>
                <!-- Nested drawer nav (Dashboards)-->
                <div class="collapse {{ (request()->is('admin/general*')) ? 'show' : '' }}" id="collapseDashboards" aria-labelledby="headingOne" data-bs-parent="#drawerAccordion">
                    <nav class="drawer-menu-nested nav">
                        <a class="nav-link {{ (request()->is('admin/general/setting')) ? 'active' : '' }}" href="{{ route('website.setting') }}">{{ __('global.subCategory.setting') }}</a>
                    </nav>
                </div>
                <!-- Drawer link (Layouts)-->
                <a class="nav-link {{ (request()->is('admin/editer*')) ? 'active' : 'collapsed' }}" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="nav-link-icon"><span class="material-icons">edit_document</span></div>
                    {{ __('global.category.editer') }}
                    <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                </a>
                <!-- Nested drawer nav (Layouts)-->
                <div class="collapse {{ (request()->is('admin/editer*')) ? 'show' : '' }}" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#drawerAccordion">
                    <nav class="drawer-menu-nested nav">
                        <a class="nav-link {{ (request()->is('admin/editer/brands*')) ? 'active' : '' }}" href="{{ route('brands.index') }}">{{ __('global.subCategory.brand') }}</a>
                        <a class="nav-link" href="javascript:void(0);">{{ __('global.subCategory.phone') }}</a>
                        <a class="nav-link" href="javascript:void(0);">{{ __('global.subCategory.module') }}</a>
                        <a class="nav-link" href="javascript:void(0);">{{ __('global.subCategory.moduleFunction') }}</a>
                        <a class="nav-link" href="javascript:void(0);">{{ __('global.subCategory.feature') }}</a>
                        <a class="nav-link" href="javascript:void(0);">{{ __('global.subCategory.reseller') }}</a>
                        <a class="nav-link" href="javascript:void(0);">{{ __('global.subCategory.driver') }}</a>
                        <a class="nav-link" href="javascript:void(0);">{{ __('global.subCategory.contact') }}</a>
                        <a class="nav-link" href="javascript:void(0);">{{ __('global.subCategory.help') }}</a>
                        <a class="nav-link" href="javascript:void(0);">{{ __('global.subCategory.news') }}</a>
                        <a class="nav-link" href="javascript:void(0);">{{ __('global.subCategory.servers') }}</a>
                    </nav>
                </div>
                <!-- Drawer link (Pages)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="nav-link-icon"><span class="material-icons">watch_later</span></div>
                    {{ __('global.category.histories') }}
                    <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                </a>
                <!-- Nested drawer nav (Pages)-->
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#drawerAccordion">
                    <nav class="drawer-menu-nested nav accordion" id="drawerAccordionPages">
                        <a class="nav-link" href="javascript:void(0);">{{ __('global.subCategory.updateHistory') }}</a>
                        <a class="nav-link" href="javascript:void(0);">{{ __('global.subCategory.successStory') }}</a>
                    </nav>
                </div>
                <!-- Drawer link (Pages)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseModels" aria-expanded="false" aria-controls="collapseModels">
                    <div class="nav-link-icon"><span class="material-icons">business_center</span></div>
                    {{ __('global.category.customModels') }}
                    <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                </a>
                <!-- Nested drawer nav (Pages)-->
                <div class="collapse" id="collapseModels" aria-labelledby="headingTwo" data-bs-parent="#drawerAccordion">
                    <nav class="drawer-menu-nested nav accordion" id="drawerAccordionPages">
                        <a class="nav-link" href="javascript:void(0);">{{ __('global.subCategory.samsungModels') }}</a>
                    </nav>
                </div>
                <!-- Drawer link (Pages)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseOther" aria-expanded="false" aria-controls="collapseOther">
                    <div class="nav-link-icon"><span class="material-icons">info</span></div>
                    {{ __('global.category.other') }}
                    <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                </a>
                <!-- Nested drawer nav (Pages)-->
                <div class="collapse" id="collapseOther" aria-labelledby="headingTwo" data-bs-parent="#drawerAccordion">
                    <nav class="drawer-menu-nested nav accordion" id="drawerAccordionPages">
                        <a class="nav-link" href="javascript:void(0);">{{ __('global.subCategory.mainSlide') }}</a>
                        <a class="nav-link" href="javascript:void(0);">{{ __('global.subCategory.description') }}</a>
                        <a class="nav-link" href="javascript:void(0);">{{ __('global.subCategory.guide') }}</a>
                        <a class="nav-link" href="javascript:void(0);">{{ __('global.subCategory.problems') }}</a>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Drawer footer        -->
        <div class="drawer-footer border-top">
            <div class="d-flex align-items-center">
                <i class="material-icons text-muted">account_circle</i>
                <div class="ms-3">
                    <div class="caption">{{ __('global.loginAs') }}</div>
                    <div class="small fw-500">{{ Auth::user()->name }}</div>
                </div>
            </div>
        </div>
    </nav>
</div>