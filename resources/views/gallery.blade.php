<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('./partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">
      <flux:header container class="bg-zinc-50 dark:bg-zinc-900 border-b border-zinc-200 dark:border-zinc-700">
          <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
  
          <flux:brand href="#" logo="https://fluxui.dev/img/demo/logo.png" name="Acme Inc." class="max-lg:hidden dark:hidden" />
          <flux:brand href="#" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" name="Acme Inc." class="max-lg:hidden! hidden dark:flex" />
  
          <flux:navbar class="-mb-px max-lg:hidden">
              <flux:navbar.item icon="home" href="#" current>Home</flux:navbar.item>
              <flux:navbar.item icon="inbox" badge="12" href="#">Inbox</flux:navbar.item>
              <flux:navbar.item icon="document-text" href="#">Documents</flux:navbar.item>
              <flux:navbar.item icon="calendar" href="#">Calendar</flux:navbar.item>
  
              <flux:separator vertical variant="subtle" class="my-2"/>
  
              <flux:dropdown class="max-lg:hidden">
                  <flux:navbar.item icon-trailing="chevron-down">Favorites</flux:navbar.item>
  
                  <flux:navmenu>
                      <flux:navmenu.item href="#">Marketing site</flux:navmenu.item>
                      <flux:navmenu.item href="#">Android app</flux:navmenu.item>
                      <flux:navmenu.item href="#">Brand guidelines</flux:navmenu.item>
                  </flux:navmenu>
              </flux:dropdown>
          </flux:navbar>
  
          <flux:spacer />

          @if (Route::has('login'))
          <nav class="flex items-center justify-end gap-4">
              @auth
                  <a
                      href="{{ url('/admin') }}"
                      class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                  >
                      Dashboard
                  </a>
              @else
                  <a
                      href="{{ route('login') }}"
                      class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                  >
                      Log in
                  </a>

                  @if (Route::has('register'))
                      <a
                          href="{{ route('register') }}"
                          class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                          Register
                      </a>
                  @endif
              @endauth
          </nav>
      @endif
  
          <flux:navbar class="mr-4">
              <flux:button x-data x-on:click="$flux.dark = ! $flux.dark" icon="moon" variant="subtle" aria-label="Toggle dark mode" />
          </flux:navbar>
        </flux:header>
  
      <flux:sidebar stashable sticky class="lg:hidden bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-700">
          <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />
  
          <flux:brand href="#" logo="https://fluxui.dev/img/demo/logo.png" name="Acme Inc." class="px-2 dark:hidden" />
          <flux:brand href="#" logo="https://fluxui.dev/img/demo/dark-mode-logo.png" name="Acme Inc." class="px-2 hidden dark:flex" />
  
          <flux:navlist variant="outline">
              <flux:navlist.item icon="home" href="#" current>Home</flux:navlist.item>
              <flux:navlist.item icon="inbox" badge="12" href="#">Inbox</flux:navlist.item>
              <flux:navlist.item icon="document-text" href="#">Documents</flux:navlist.item>
              <flux:navlist.item icon="calendar" href="#">Calendar</flux:navlist.item>
          </flux:navlist>
  
      </flux:sidebar>
    
    <main class="p-6 max-w-6xl mx-auto">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <div class="bg-slate-200 dark:bg-slate-800 rounded-lg overflow-hidden shadow-lg hover:scale-105 transition-transform">
                <img src="https://via.placeholder.com/400" alt="Gallery Item" class="w-full h-60 object-cover">
            </div>
            <div class="bg-slate-200 dark:bg-slate-800 rounded-lg overflow-hidden shadow-lg hover:scale-105 transition-transform">
                <img src="https://via.placeholder.com/400" alt="Gallery Item" class="w-full h-60 object-cover">
            </div>
            <div class="bg-slate-200 dark:bg-slate-800 rounded-lg overflow-hidden shadow-lg hover:scale-105 transition-transform">
                <img src="https://via.placeholder.com/400" alt="Gallery Item" class="w-full h-60 object-cover">
            </div>
            <div class="bg-slate-200 dark:bg-slate-800 rounded-lg overflow-hidden shadow-lg hover:scale-105 transition-transform">
                <img src="https://via.placeholder.com/400" alt="Gallery Item" class="w-full h-60 object-cover">
            </div>
        </div>
    </main>
    
    @if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
    @endif

    @fluxScripts
</body>
</html>
