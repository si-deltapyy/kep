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
                    <x-navigation :route="'dashboard'" :text="'Dashboard'" />
                    <x-navigation :route="'user.ajuan.index'" :text="'Pengajuan'" />
                    <x-navigation :route="'dashboard'" :text="'Dokumen EC'" />

                    <div class="border-b border-dashed dark:border-slate-700/40 my-3 group-data-[sidebar=dark]:border-slate-700/40 group-data-[sidebar=brand]:border-slate-700/40"></div>
                    <div class="text-[9px] text-slate-600 dark:text-slate-500 group-data-[sidebar=dark]:text-slate-500 group-data-[sidebar=brand]:text-slate-400">
                        <span>Other</span>
                    </div>

                    <x-navigation :route="'dashboard'" :text="'Message'" />
                    <x-navigation :route="'dashboard'" :text="'Profile'" />
                @endrole

                @role('sekretariat')
                    <x-navigation :route="'sekretariat.pengajuan.index'" :text="'Pengajuan'" />
                    <x-navigation :route="'sekretariat.ec.index'" :text="'ECDocument'" />
                    <x-navigation :route="'sekretariat.review.index'" :text="'Reviewer List'" />
                    <x-navigation :route="'sekretariat.message.index'" :text="'Pesan'" />
                @endrole

                @role('reviewer')
                    <x-navigation :route="'reviewer.pengajuan.index'" :text="'Pengajuan'" />
                    {{-- <x-nav-link :route="'pages.ec.index'" :text="'ECDocument'" /> --}}
                @endrole

                </div>
              </div>
            </li>
          </ul>
    </div>


</div>
