<div class="min-h-full z-[99] fixed inset-y-0 print:hidden bg-gradient-to-t from-[#6f3dc3] from-10% via-[#603dc3] via-40% to-[#5c3dc3] to-100% dark:bg-[#603dc3] main-sidebar duration-300 group-data-[sidebar=dark]:bg-[#603dc3] group-data-[sidebar=brand]:bg-brand group-[.dark]:group-data-[sidebar=brand]:bg-[#603dc3]">
      <div class="text-center border-b bg-[#603dc3] border-r h-[64px] flex justify-center items-center brand-logo dark:bg-[#603dc3] dark:border-slate-700/40 group-data-[sidebar=dark]:bg-[#603dc3] group-data-[sidebar=dark]:border-slate-700/40 group-data-[sidebar=brand]:bg-brand group-[.dark]:group-data-[sidebar=brand]:bg-[#603dc3] group-data-[sidebar=brand]:border-slate-700/40">
        <a href="#" class="logo">
          <span>
            <img
              src="{{ asset('assets/images/logo-fkip-uns-fkip.png') }}"
              alt="logo-small"
              style="height: 86px"
              class="logo-lg logo-light hidden dark:inline-block ms-1 group-data-[sidebar=dark]:inline-block group-data-[sidebar=brand]:inline-block"/>
          </span>
          {{-- <span>
            <img
              src="assets/images/logo.png"
              alt="logo-large"
              class="logo-lg h-[28px] logo-light hidden dark:inline-block ms-1 group-data-[sidebar=dark]:inline-block group-data-[sidebar=brand]:inline-block"/>
            <img
              src="assets/images/logo.png"
              alt="logo-large"
              class="logo-lg h-[28px] logo-dark inline-block dark:hidden ms-1 group-data-[sidebar=dark]:hidden group-data-[sidebar=brand]:hidden"/>
          </span> --}}
        </a>
      </div>

      <div class="border-r pb-14 h-[100vh] dark:bg-[#603dc3] dark:border-slate-700/40 group-data-[sidebar=dark]:border-slate-700/40 group-data-[sidebar=brand]:border-slate-700/40"
      data-simplebar>
      <div class="p-4 block">
          <ul class="navbar-nav">
              <li class="uppercase text-[11px] text-primary-500 dark:text-primary-400 mt-0 leading-4 mb-2 group-data-[sidebar=dark]:text-primary-400 group-data-[sidebar=brand]:text-primary-300">
                  <span class="text-[9px] text-slate-600 dark:text-slate-500 group-data-[sidebar=dark]:text-slate-500 group-data-[sidebar=brand]:text-slate-400">
                      Home
                    </span>
                </li>
                <li>
                <div id="parent-accordion" data-fc-type="accordion">
                @role('user')
                    @can('done-profile')
                        <x-navigation :route="'dashboard'" :text="'Dashboard'" :icon="'home'"/>
                        <x-navigation :route="'user.ajuan.index'" :text="'Pengajuan'" :icon="'file-input'"/>
                        <x-navigation :route="'user.ec.index'" :text="'Dokumen EC'" :icon="'files'"/>
                        <x-navigation :route="'user.payment.index'" :text="'Payment'" :icon="'banknote'"/>

                        <div class="border-b border-dashed dark:border-slate-700/40 my-3 group-data-[sidebar=dark]:border-slate-700/40 group-data-[sidebar=brand]:border-slate-700/40"></div>
                        <div class="text-[9px] text-slate-600 dark:text-slate-500 group-data-[sidebar=dark]:text-slate-500 group-data-[sidebar=brand]:text-slate-400">
                            <span>Other</span>
                        </div>

                        <x-navigation :route="'dashboard'" :text="'Message'" :icon="'message-square'"/>
                        <x-navigation :route="'user.profile.index'" :text="'Profile'" :icon="'user-cog'"/>
                    @endcan

                    @can('waiting-acception')
                        <x-navigation :route="'dashboard'" :text="'Dashboard'" :icon="'home'"/>
                    @endcan
                @endrole

                @role('admin')
                    <x-navigation :route="'dashboard'" :text="'Dashboard'" :icon="'files'"/>
                    <x-navigation :route="'admin.pengajuan.index'" :text="'Pengajuan'" :icon="'book-open-check'"/>
                    <x-navigation :route="'admin.ec.index'" :text="'ECDocument'" :icon="'scroll-text'"/>
                    {{-- <x-navigation :route="'admin.sekertarisList'" :text="'List Sekertaris'" :icon="'file-user'"/> --}}

                    <div class="border-b border-dashed dark:border-slate-700/40 my-3 group-data-[sidebar=dark]:border-slate-700/40 group-data-[sidebar=brand]:border-slate-700/40"></div>
                    <div class="text-[9px] text-slate-600 dark:text-slate-500 group-data-[sidebar=dark]:text-slate-500 group-data-[sidebar=brand]:text-slate-400">
                        <span>Other</span>
                    </div>

                    <x-navigation :route="'admin.user.request.index'" :text="'User Request'" :icon="'user'"/>
                    <x-navigation :route="'admin.payment.index'" :text="'Payment'" :icon="'banknote'"/>
                    <x-navigation :route="'admin.template.index'" :text="'Kelola Template'" :icon="'file'"/>
                @endrole

                @role('reviewer')
                    <x-navigation :route="'dashboard'" :text="'Dashboard'" :icon="'home'"/>
                    <x-navigation :route="'reviewer.pengajuan.index'" :text="'Ajuan Review'" :icon="'pen-line'"/>
                    {{-- <x-navigation :route="'reviewer.dokRev.index'" :text="'Review Dokumen'" :icon="'file'"/> --}}
                @endrole

                @role('super_admin')
                    <x-navigation :route="'dashboard'" :text="'Dashboard'"  :icon="'home'"/>
                    <div data-fc-type="collapse" data-fc-parent="parent-accordion">
                      <a href="#"
                         class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200">
                          <span data-lucide="contact"
                                class="w-5 h-5 text-center text-slate-800 me-2 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                          <span>Manage Users</span>
                          <i class="icofont-thin-down fc-collapse-open:rotate-180 ms-auto inline-block text-[14px] transform transition-transform duration-300 text-white  group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></i>
                      </a>
                  </div>
                  <div class="hidden  overflow-hidden">
                      <ul class="nav flex-col flex flex-wrap ps-0 mb-0 ms-2" id="apps-accordion"
                          data-fc-type="accordion">
                          <li class="nav-item relative block">
                              <a href="{{ route('superadmin.manage.user') }}"
                                 class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200  flex items-center decoration-0 px-3 py-3">
                                  <i class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                                  User
                              </a>
                          </li>
                          <li class="nav-item relative block">
                              <a href="{{ route('superadmin.manage.reviewer') }}"
                                 class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200   flex items-center decoration-0 px-3 py-3">
                                  <i class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                                  Reviewer
                              </a>
                          </li>
                          <li class="nav-item relative block">
                              <a href="{{ route('superadmin.manage.sekertaris') }}"
                                 class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200   flex items-center decoration-0 px-3 py-3">
                                  <i class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                                  Sekertaris
                              </a>
                          </li>
                      </ul>
                  </div>
                  <div data-fc-type="collapse" data-fc-parent="parent-accordion">
                    <a href="#"
                       class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200">
                        <span data-lucide="database"
                              class="w-5 h-5 text-center text-slate-800 me-2 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                        <span>Change Data</span>
                        <i class="icofont-thin-down fc-collapse-open:rotate-180 ms-auto inline-block text-[14px] transform transition-transform duration-300 text-slate-800 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></i>
                    </a>
                  </div>
                  <div class="hidden  overflow-hidden">
                    <ul class="nav flex-col flex flex-wrap ps-0 mb-0 ms-2" id="apps-accordion"
                        data-fc-type="accordion">
                        <li class="nav-item relative block">
                            <a href="{{ route('superadmin.prodi.index') }}"
                               class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200  flex items-center decoration-0 px-3 py-3">
                                <i class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                                Prodi
                            </a>
                        </li>
                        <li class="nav-item relative block">
                            <a href="{{ route('superadmin.typeajuan.index')}}"
                               class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200   flex items-center decoration-0 px-3 py-3">
                                <i class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                                Type Ajuan
                            </a>
                        </li>
                        <li class="nav-item relative block">
                            <a href="{{ route('superadmin.typedokumen.index') }}"
                               class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200   flex items-center decoration-0 px-3 py-3">
                                <i class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                                Dokumen Type
                            </a>
                        </li>
                    </ul>
                  </div>

                  <x-navigation :route="'superadmin.manage.view'" :text="'Change Dashboard'" :icon="'image-plus'"/>

                    <div class="border-b border-dashed dark:border-slate-700/40 my-3 group-data-[sidebar=dark]:border-slate-700/40 group-data-[sidebar=brand]:border-slate-700/40"></div>
                    <div class="text-[9px] text-slate-600 dark:text-slate-500 group-data-[sidebar=dark]:text-slate-500 group-data-[sidebar=brand]:text-slate-400">
                        <span>Security</span>
                    </div>

                    <x-navigation :route="'superadmin.change.password'" :text="'Change Password'" :icon="'key-round'"/>
                    <div data-fc-type="collapse" data-fc-parent="parent-accordion">
                      <a href="#"
                         class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200">
                          <span data-lucide="shield-alert"
                                class="w-5 h-5 text-center text-slate-800 me-2 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                          <span>Security Management</span>
                          <i class="icofont-thin-down fc-collapse-open:rotate-180 ms-auto inline-block text-[14px] transform transition-transform duration-300 text-slate-800 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></i>
                      </a>
                    </div>
                    <div class="hidden  overflow-hidden">
                      <ul class="nav flex-col flex flex-wrap ps-0 mb-0 ms-2" id="apps-accordion"
                          data-fc-type="accordion">
                          <li class="nav-item relative block">
                              <a href="{{ route('superadmin.manage.permission') }}"
                                 class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200  flex items-center decoration-0 px-3 py-3">
                                  <i class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                                  Permission
                              </a>
                          </li>
                          <li class="nav-item relative block">
                              <a href="{{ route('superadmin.manage.role') }}"
                                 class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200   flex items-center decoration-0 px-3 py-3">
                                  <i class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                                  Role
                              </a>
                          </li>
                          {{-- <li class="nav-item relative block">
                              <a href="{{ route('superadmin.manage.password') }}"
                                 class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200   flex items-center decoration-0 px-3 py-3">
                                  <i class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                                  Password
                              </a>
                          </li> --}}
                      </ul>
                    </div>

                    <div class="border-b border-dashed dark:border-slate-700/40 my-3 group-data-[sidebar=dark]:border-slate-700/40 group-data-[sidebar=brand]:border-slate-700/40"></div>
                    <div class="text-[9px] text-slate-600 dark:text-slate-500 group-data-[sidebar=dark]:text-slate-500 group-data-[sidebar=brand]:text-slate-400">
                        <span>Other</span>
                    </div>

                    <x-navigation :route="'superadmin.setting.index'" :text="'Setting'" :icon="'settings'"/>
                @endrole

                @role('sekertaris')
                    <x-navigation :route="'dashboard'" :text="'Dashboard'"  :icon="'home'"/>
                    <x-navigation :route="'sekertaris.pengajuan.index'" :text="'Pengajuan'" :icon="'file'"/>
                    <x-navigation :route="'sekertaris.ec.index'" :text="'ECDocument'" :icon="'files'"/>
                    {{-- <x-navigation :route="'sekertaris.review.index'" :text="'Manage Reviewer'"  :icon="'contact'"/> --}}
                    <div class="border-b border-dashed dark:border-slate-700/40 my-3 group-data-[sidebar=dark]:border-slate-700/40 group-data-[sidebar=brand]:border-slate-700/40"></div>

                @endrole

                @role('kppm')
                    <x-navigation :route="'dashboard'" :text="'Dashboard'" :icon="'home'"/>
                    <x-navigation :route="'kppm.pengajuan.index'" :text="'Request EC'" :icon="'files'"/>
                    {{-- <x-navigation :route="'reviewer.dokRev.index'" :text="'Review Dokumen'" :icon="'file'"/> --}}
                @endrole

                @auth
                <div class="text-[9px] text-slate-600 dark:text-slate-500 group-data-[sidebar=dark]:text-slate-500 group-data-[sidebar=brand]:text-slate-400">
                    <span>Other</span>
                </div>

                <x-navigation :route="'messages.index'" :text="'Message'" :icon="'message-square'"/>
                @endauth

                </div>
              </div>
            </li>
          </ul>
    </div>


    {{-- @role('sekretariat')
    <div class="border-r pb-14 h-[100vh] dark:bg-[#603dc3] dark:border-slate-700/40 group-data-[sidebar=dark]:border-slate-700/40 group-data-[sidebar=brand]:border-slate-700/40"
        data-simplebar>
        <div class="p-4 block">
          <ul class="navbar-nav">
            <li class="uppercase text-[11px] text-primary-500 dark:text-primary-400 mt-0 leading-4 mb-2 group-data-[sidebar=dark]:text-primary-400 group-data-[sidebar=brand]:text-primary-300">
                <span class="text-[9px] text-slate-600 dark:text-slate-500 group-data-[sidebar=dark]:text-slate-500 group-data-[sidebar=brand]:text-slate-400">
                    Home
                </span>
            </li>
            <li>
              <div id="parent-accordion" data-fc-type="accordion">
                <a href="{{ route('dashboard') }}"
                  class="nav-link hover:bg-transparent hover:text-black rounded-md dark:hover:text-slate-200 flex items-center decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200">
                  <span data-lucide="home" class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                  <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.pengajuan.index') }}"
                  class="nav-link hover:bg-transparent hover:text-black rounded-md dark:hover:text-slate-200 flex items-center decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200">
                  <span data-lucide="file-stack" class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                  <span>Daftar Ajuan</span>
                </a>

                <a href="{{ route('dashboard') }}"
                  class="nav-link hover:bg-transparent hover:text-black rounded-md dark:hover:text-slate-200 flex items-center decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200">
                  <span data-lucide="file-text" class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                  <span>Dokumen EC</span>
                </a>

                <a href="{{ route('admin.review.index') }}"
                  class="nav-link hover:bg-transparent hover:text-black rounded-md dark:hover:text-slate-200 flex items-center decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200">
                  <span data-lucide="user-check" class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                  <span>List Reviewer</span>
                </a>

                <div class="border-b border-dashed dark:border-slate-700/40 my-3 group-data-[sidebar=dark]:border-slate-700/40 group-data-[sidebar=brand]:border-slate-700/40"></div>
                <div class="text-[9px] text-slate-600 dark:text-slate-500 group-data-[sidebar=dark]:text-slate-500 group-data-[sidebar=brand]:text-slate-400">
                  <span>Other</span>
                </div>

                <a href="{{ route('dashboard') }}"
                  class="nav-link hover:bg-transparent hover:text-black rounded-md dark:hover:text-slate-200 flex items-center decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200">
                  <span data-lucide="user-plus" class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                  <span>User Request</span>
                </a>

                <a href="{{ route('dashboard') }}"
                  class="nav-link hover:bg-transparent hover:text-black rounded-md dark:hover:text-slate-200 flex items-center decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200">
                  <span data-lucide="send" class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                  <span>Message</span>
                </a>

                <a href="{{ route('dashboard') }}"
                  class="nav-link hover:bg-transparent hover:text-black rounded-md dark:hover:text-slate-200 flex items-center decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200">
                  <span data-lucide="user" class="w-5 h-5 text-center text-slate-800 dark:text-slate-400 me-2 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
                  <span>Profile</span>
                </a>

                </div>
              </div>
            </li>
          </ul>
    </div>

    //navbarr setting
    <div data-fc-type="collapse" data-fc-parent="parent-accordion">
        <a href="#"
            class="nav-link hover:bg-transparent hover:text-black  rounded-md dark:hover:text-slate-200   flex items-center  decoration-0 px-3 py-3 cursor-pointer group-data-[sidebar=dark]:hover:text-slate-200 group-data-[sidebar=brand]:hover:text-slate-200">
            <span data-lucide="grid"
                    class="w-5 h-5 text-center text-slate-800 me-2 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></span>
            <span>Apps</span>
            <i class="icofont-thin-down fc-collapse-open:rotate-180 ms-auto inline-block text-[14px] transform transition-transform duration-300 text-slate-800 dark:text-slate-400 group-data-[sidebar=dark]:text-slate-400 group-data-[sidebar=brand]:text-slate-400"></i>
        </a>
    </div>
    <div class="hidden  overflow-hidden">
        <ul class="nav flex-col flex flex-wrap ps-0 mb-0 ms-2" id="apps-accordion"
            data-fc-type="accordion">
            <li class="nav-item relative block">
                <a href=""
                    class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200  flex items-center decoration-0 px-3 py-3">
                    <i class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                    Sub Menu 1
                </a>
            </li>
            <li class="nav-item relative block">
                <a href=""
                    class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200   flex items-center decoration-0 px-3 py-3">
                    <i class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                    Sub Menu 1
                </a>
            </li>
            <li class="nav-item relative block">
                <a href=""
                    class="nav-link  hover:text-primary-500  rounded-md dark:hover:text-primary-500 relative group-data-[sidebar=brand]:hover:text-slate-200   flex items-center decoration-0 px-3 py-3">
                    <i class="icofont-dotted-right me-2 text-slate-600 text-[8px] group-data-[sidebar=brand]:text-slate-400"></i>
                    Sub Menu 1
                </a>
            </li>



        </ul>
    </div>
    @endrole --}}
</div>
