<div class="relative flex w-full max-w-[24rem] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
    <div
      class="relative grid px-4 py-8 m-0 overflow-hidden text-center text-white bg-gray-900 place-items-center rounded-md bg-clip-border shadow-gray-900/20">
      <h5 class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-white">
        Avail Your Gift Card
      </h5>
    </div>
    <div class="z-[999] backdrop-blur-sm absolute grid h-full w-full place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible hidden" id="spinner2">
      <svg class="text-gray-300 animate-spin" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg"
        width="24" height="24">
        <path
          d="M32 3C35.8083 3 39.5794 3.75011 43.0978 5.20749C46.6163 6.66488 49.8132 8.80101 52.5061 11.4939C55.199 14.1868 57.3351 17.3837 58.7925 20.9022C60.2499 24.4206 61 28.1917 61 32C61 35.8083 60.2499 39.5794 58.7925 43.0978C57.3351 46.6163 55.199 49.8132 52.5061 52.5061C49.8132 55.199 46.6163 57.3351 43.0978 58.7925C39.5794 60.2499 35.8083 61 32 61C28.1917 61 24.4206 60.2499 20.9022 58.7925C17.3837 57.3351 14.1868 55.199 11.4939 52.5061C8.801 49.8132 6.66487 46.6163 5.20749 43.0978C3.7501 39.5794 3 35.8083 3 32C3 28.1917 3.75011 24.4206 5.2075 20.9022C6.66489 17.3837 8.80101 14.1868 11.4939 11.4939C14.1868 8.80099 17.3838 6.66487 20.9022 5.20749C24.4206 3.7501 28.1917 3 32 3L32 3Z"
          stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path
          d="M32 3C36.5778 3 41.0906 4.08374 45.1692 6.16256C49.2477 8.24138 52.7762 11.2562 55.466 14.9605C58.1558 18.6647 59.9304 22.9531 60.6448 27.4748C61.3591 31.9965 60.9928 36.6232 59.5759 40.9762"
          stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" class="text-gray-900">
        </path>
      </svg>
    </div>
    <div class="p-6">
      <div class="block overflow-visible">
        <p class="text-center text-gray-900 font-semibold">Total Balance: ₹<span id="showBalance">0</span>/- </p>
        <p class="text-center text-red-500" id="main_error_message"></p>
        <p class="text-center text-green-900" id="main_success_message"></p>
        <div class="relative block w-full overflow-hidden !overflow-x-hidden !overflow-y-visible bg-transparent">
          <div role="tabpanel"
            class="w-full p-0 font-sans text-base antialiased font-light leading-relaxed text-gray-700 h-max"
            data-value="card">
            <form class="flex flex-col gap-4 mt-12">
              <div>
                <p class="block mb-2 font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                  Your Number
                </p>
                <div class="relative h-10 w-full min-w-[200px]">
                  <input type="number" placeholder="96XXXXXX01"
                    class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent !border-t-blue-gray-200 bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:!border-t-gray-900 focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50 [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none" 
                    name="phonenumber"
                    id="phonenumber"/>
                  <label
                    class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all before:content-none after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all after:content-none peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500"></label>
                </div>
                <p class="text-red-900 font-semibold text-sm px-3 pb-0 relative" id="phonenumber_error_message"></p>
              </div>
              <div class="flex justify-between items-center gap-2">
                <button
              class="w-full select-none rounded-lg bg-gray-400 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-gray-900 shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none hidden"
              type="button"
              onclick="validate_phone()"
              id="try_again_modal">
              Try Again
            </button>
              <button
              class="w-full select-none rounded-lg bg-gray-900 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
              type="button"
              onclick="validate_phone()"
              id="trigger_modal">
              Proceed
            </button>
              </div>
            
             
              <p
                class="flex items-center justify-center gap-2 mt-2 font-sans text-sm antialiased font-medium leading-normal text-gray-700 opacity-60">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                  class="-mt-0.5 h-4 w-4">
                  <path fill-rule="evenodd"
                    d="M12 1.5a5.25 5.25 0 00-5.25 5.25v3a3 3 0 00-3 3v6.75a3 3 0 003 3h10.5a3 3 0 003-3v-6.75a3 3 0 00-3-3v-3c0-2.9-2.35-5.25-5.25-5.25zm3.75 8.25v-3a3.75 3.75 0 10-7.5 0v3h7.5z"
                    clip-rule="evenodd"></path>
                </svg>
                Payments are secure and encrypted
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>