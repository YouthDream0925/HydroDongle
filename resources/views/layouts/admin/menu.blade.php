<div id="layoutDrawer_nav">
    <!-- Drawer navigation-->
    <nav class="drawer accordion drawer-light bg-white" id="drawerAccordion">
        <div class="drawer-menu">
            <div class="nav">
                <div class="drawer-menu-heading pt-15"></div>
                <!-- Drawer link (General)-->
                <a class="nav-link {{ (request()->is('admin/general*')) ? 'active' : 'collapsed' }}" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                    <div class="nav-link-icon"><span class="material-icons">home</span></div>
                    {{ __('global.category.general') }}
                    <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                </a>
                <!-- Nested drawer nav (General)-->
                <div class="collapse {{ (request()->is('admin/general*')) ? 'show' : '' }}" id="collapseDashboards" aria-labelledby="headingOne" data-bs-parent="#drawerAccordion">
                    <nav class="drawer-menu-nested nav">
                        @if(!empty(Auth::user()->getRoleNames()) && Auth::user()->hasExactRoles('SuperAdmin'))
                        <a class="nav-link {{ (request()->is('admin/general/setting')) ? 'active' : '' }}" href="{{ route('website.setting') }}">{{ __('global.subCategory.setting') }}</a>
                        <a class="nav-link {{ (request()->is('admin/general/credit/setting')) ? 'active' : '' }}" href="{{ route('website.credit.setting') }}">{{ __('global.subCategory.creditSetting') }}</a>
                        @endif
                        @can('user-list')
                        <a class="nav-link {{ (request()->is('admin/general/admins*')) ? 'active' : '' }}" href="{{ route('admins.index') }}">{{ __('global.subCategory.adminUsers') }}</a>
                        <a class="nav-link {{ (request()->is('admin/general/users*')) ? 'active' : '' }}" href="{{ route('users.index') }}">{{ __('global.subCategory.onlineUsers') }}</a>
                        <a class="nav-link {{ (request()->is('admin/general/dongles*')) ? 'active' : '' }}" href="{{ route('dongles.index') }}">{{ __('global.subCategory.dongleUsers') }}</a>
                        @endcan
                        @can('role-list')
                        <a class="nav-link {{ (request()->is('admin/general/roles*')) ? 'active' : '' }}" href="{{ route('roles.index') }}">{{ __('global.subCategory.roles') }}</a>
                        @endcan

                        @can('transfer-credit-to-user')
                        <a class="nav-link {{ (request()->is('admin/general/credits*')) ? 'active' : '' }}" href="{{ route('credits.before') }}">{{ __('global.subCategory.creditTransfer') }}</a>
                        @elsecan('transfer-credit-to-reseller')
                        <a class="nav-link {{ (request()->is('admin/general/credits*')) ? 'active' : '' }}" href="{{ route('credits.before') }}">{{ __('global.subCategory.creditTransfer') }}</a>
                        @elsecan('transfer-credit-to-distributor')
                        <a class="nav-link {{ (request()->is('admin/general/credits*')) ? 'active' : '' }}" href="{{ route('credits.before') }}">{{ __('global.subCategory.creditTransfer') }}</a>
                        @endcan                        
                    </nav>
                </div>
                <!-- Drawer link (Add/Edit/Delete)-->
                <a class="nav-link {{ (request()->is('admin/editer*')) ? 'active' : 'collapsed' }}" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="nav-link-icon"><span class="material-icons">edit_document</span></div>
                    {{ __('global.category.editer') }}
                    <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                </a>
                <!-- Nested drawer nav (Add/Edit/Delete)-->
                <div class="collapse {{ (request()->is('admin/editer*')) ? 'show' : '' }}" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#drawerAccordion">
                    <nav class="drawer-menu-nested nav">
                        <a class="nav-link {{ (request()->is('admin/editer/brands*')) ? 'active' : '' }}" href="{{ route('brands.index') }}">{{ __('global.subCategory.brand') }}</a>
                        <a class="nav-link {{ (request()->is('admin/editer/cpus*')) ? 'active' : '' }}" href="{{ route('cpus.index') }}">{{ __('global.subCategory.cpu') }}</a>
                        <a class="nav-link {{ (request()->is('admin/editer/features*')) ? 'active' : '' }}" href="{{ route('features.index') }}">{{ __('global.subCategory.feature') }}</a>
                        <a class="nav-link {{ (request()->is('admin/editer/models*')) ? 'active' : '' }}" href="{{ route('models.index') }}">{{ __('global.subCategory.model') }}</a>
                        <a class="nav-link {{ (request()->is('admin/editer/countries*')) ? 'active' : '' }}" href="{{ route('countries.index') }}">{{ __('global.country') }}</a>
                        <a class="nav-link {{ (request()->is('admin/editer/resellers*')) ? 'active' : '' }}" href="{{ route('resellers.index') }}">{{ __('global.subCategory.reseller') }}</a>
                        <a class="nav-link {{ (request()->is('admin/editer/products*')) ? 'active' : '' }}" href="{{ route('products.index') }}">{{ __('global.subCategory.product') }}</a>
                        <a class="nav-link {{ (request()->is('admin/editer/drivers*')) ? 'active' : '' }}" href="{{ route('drivers.index') }}">{{ __('global.subCategory.driver') }}</a>
                        <a class="nav-link {{ (request()->is('admin/editer/helps*')) ? 'active' : '' }}" href="{{ route('helps.index') }}">{{ __('global.subCategory.help') }}</a>
                        <a class="nav-link {{ (request()->is('admin/editer/faqs*')) ? 'active' : '' }}" href="{{ route('faqs.index') }}">{{ __('global.subCategory.faq') }}</a>
                        <a class="nav-link {{ (request()->is('admin/editer/tests*')) ? 'active' : '' }}" href="{{ route('tests.index') }}">{{ __('global.subCategory.test') }}</a>
                    </nav>
                </div>
                <!-- Drawer link (Histories)-->
                <a class="nav-link {{ (request()->is('admin/history*')) ? 'active' : 'collapsed' }}" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="nav-link-icon"><span class="material-icons">watch_later</span></div>
                    {{ __('global.category.histories') }}
                    <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                </a>
                <!-- Nested drawer nav (Histories)-->
                <div class="collapse {{ (request()->is('admin/history*')) ? 'show' : '' }}" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#drawerAccordion">
                    <nav class="drawer-menu-nested nav accordion" id="drawerAccordionPages">
                        <a class="nav-link {{ (request()->is('admin/history/updates*')) ? 'active' : '' }}" href="{{ route('updates.index') }}">{{ __('global.subCategory.updateHistory') }}</a>
                        <a class="nav-link {{ (request()->is('admin/history/credits/index')) ? 'active' : '' }}" href="{{ route('credits.index') }}">{{ __('global.subCategory.creditHistory') }}</a>
                        <a class="nav-link {{ (request()->is('admin/history/payments*')) ? 'active' : '' }}" href="{{ route('payments.index') }}">{{ __('global.subCategory.paymentHistory') }}</a>
                        <a class="nav-link {{ (request()->is('admin/history/licenses*')) ? 'active' : '' }}" href="{{ route('licenses.index') }}">{{ __('global.subCategory.licenseHistory') }}</a>
                        <!-- <a class="nav-link" href="javascript:void(0);">{{ __('global.subCategory.paymentHistory') }}</a> -->
                    </nav>
                </div>
                <!-- Drawer link (Other)-->
                <a class="nav-link {{ (request()->is('admin/other*')) ? 'active' : 'collapsed' }}" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseOther" aria-expanded="false" aria-controls="collapseOther">
                    <div class="nav-link-icon"><span class="material-icons">info</span></div>
                    {{ __('global.category.other') }}
                    <div class="drawer-collapse-arrow"><i class="material-icons">expand_more</i></div>
                </a>
                <!-- Nested drawer nav (Other)-->
                <div class="collapse {{ (request()->is('admin/other*')) ? 'show' : '' }}" id="collapseOther" aria-labelledby="headingTwo" data-bs-parent="#drawerAccordion">
                    <nav class="drawer-menu-nested nav accordion" id="drawerAccordionPages">
                        <a class="nav-link {{ (request()->is('admin/other/slides*')) ? 'active' : '' }}" href="{{ route('slides.index') }}">{{ __('global.subCategory.mainSlide') }}</a>
                        <a class="nav-link {{ (request()->is('admin/other/intro*')) ? 'active' : '' }}" href="{{ route('intro.index') }}">{{ __('global.subCategory.description') }}</a>
                        <a class="nav-link {{ (request()->is('admin/other/guide*')) ? 'active' : '' }}" href="{{ route('guide.index') }}">{{ __('global.subCategory.guide') }}</a>
                        <a class="nav-link {{ (request()->is('admin/other/problems*')) ? 'active' : '' }}" href="{{ route('problems.index') }}">{{ __('global.subCategory.problems') }}</a>
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
                    <div class="small fw-500">{{ Auth::user()->email }}</div>
                </div>
            </div>
        </div>
    </nav>
</div>