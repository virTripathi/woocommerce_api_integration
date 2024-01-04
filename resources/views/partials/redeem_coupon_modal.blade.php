<div data-dialog-backdrop="dialog" data-dialog-backdrop-close="true"
  class="pointer-events-none fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 opacity-0 backdrop-blur-sm transition-opacity duration-300">
  
  <div data-dialog="dialog"
      class="relative mx-auto flex w-full max-w-[24rem] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
      @include('partials.spinner')
      <div class="flex flex-col gap-4 p-6">
        <h4
          class="block font-sans text-2xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
          Redeem Coupon
        </h4>
        <p class="block mb-3 font-sans text-base antialiased font-normal leading-relaxed text-yellow-700">
          Enter A Valid Coupon Code to Redeem Amount
        </p>
        <div class="relative h-16 w-full min-w-[200px]">
          <input
            class="w-full h-full px-3 py-3 font-sans text-sm font-normal transition-all bg-transparent border rounded-md peer border-blue-gray-200 border-t-transparent text-blue-gray-700 outline outline-0 placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
            placeholder=" " name="coupon_code"/>
          <label
            class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[4.1] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
            Coupon Code
          </label>
          <p class="text-red-900 font-semibold text-sm px-3 pb-0 absolute bottom-0" id="error_message"></p>
        </div>
      </div>
      <div class="p-6 pt-0">
        <div class="flex justify-between items-center gap-2">
          <button data-ripple-light="true" data-dialog-close="true" type="button"
          class="block w-full select-none rounded-lg bg-gradient-to-tr from-gray-300 to-gray-400 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-gray-900 shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
          onclick="unmountDialog()">
          Back
        </button>
  <button
    class="block w-full select-none rounded-lg bg-gradient-to-tr from-gray-900 to-gray-800 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-gray-900/10 transition-all hover:shadow-lg hover:shadow-gray-900/20 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
    type="button" id="redeem_coupon_btn">
    Redeem
  </button>
        </div>
       
      </div>
      <hr>

    </div>
</div>  