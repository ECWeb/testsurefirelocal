

<div class="sticky top-0" style="z-index:50"
  x-data="{
      open: false,
      hasScrolled: false,
      reactOnScroll() {
          if (this.$el.getBoundingClientRect().top < 100 && window.scrollY > 100) {
              this.hasScrolled = true;
          } else {
              this.hasScrolled = false;
          }
      } 
  }"
  x-init="reactOnScroll()"
  @scroll.window="reactOnScroll()"
  >


  <nav class="bg-theme cpd-nav container-fluid ">
    <div :class="hasScrolled ? 'py-0' : 'py-4'" class="container px-12 mx-auto md:flex md:justify-between md:items-center" x-data="{ open: false }">
        <div class="flex items-center justify-between">
            <div>
              <a href="/" class="flex text-bold text-[24px] md:text-[32px]">
                <span>Coupons</span><span style="color:#FFFFFF">Plus</span><span>Deals</span>
              </a>
            </div>
            
            <!-- Mobile menu button -->
            <div class="flex md:hidden">
                <button type="button" x-on:click="open = ! open" class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
                    <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current">
                        <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="md:hidden" x-show="open">
          <div class="flex flex-col md:flex-row md:mx-6">
              <a href="/" class="block mx-4 h-6 lg:h-16 leading-[1rem] lg:leading-[4rem] border-b-4 border-transparent hover:text-red-700 hover:border-current nav-menu-link" href="#">Home</a>
              <a href="/categories" class="block mx-4 h-6 lg:h-16 leading-[1rem] lg:leading-[4rem] border-b-4 border-transparent hover:text-red-700 hover:border-current nav-menu-link" href="#">Categories</a>
              <a href="/blogs" class="block mx-4 h-6 lg:h-16 leading-[1rem] lg:leading-[4rem] border-b-4 border-transparent hover:text-red-700 hover:border-current nav-menu-link" href="#">Blogs</a>
          </div>
        </div>

        <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
        <div class="hidden items-center md:flex">
            <div class="flex flex-col md:flex-row md:mx-6">
                <a href="/" class="block mx-4 h-6 lg:h-16 leading-[1rem] lg:leading-[4rem] border-b-4 border-transparent hover:text-red-700 hover:border-current nav-menu-link" href="#">Home</a>
                <a href="/categories" class="block mx-4 h-6 lg:h-16 leading-[1rem] lg:leading-[4rem] border-b-4 border-transparent hover:text-red-700 hover:border-current nav-menu-link" href="#">Categories</a>
                <a href="/blogs" class="block mx-4 h-6 lg:h-16 leading-[1rem] lg:leading-[4rem] border-b-4 border-transparent hover:text-red-700 hover:border-current nav-menu-link" href="#">Blogs</a>
            </div>
        </div>
    </div>
  </nav>

</div>