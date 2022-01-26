<template>
  <div>
    <ul class="flex border-b mt-1">
        <li class="mr-2">
            <img class="object-fill h-10 border-t inline-block" src="/assets/images/bc.png">
        </li>
        <li class="mr-1">
            <router-link 
                class="bg-white inline-block py-2 px-4 font-semibold text-bc-blue"
                :to="{ name: 'home' }"
                active-class="bg-bc-blue text-bc-white border-l border-t border-r rounded-t"
            >
                Summary
            </router-link>
        </li>
        <li class="mr-1">
            <router-link
                class="bg-white inline-block py-2 px-4 text-bc-blue font-semibold"
                :to="{ name: 'edit' }"
                active-class="bg-bc-blue text-bc-white border-l border-t border-r rounded-t"
            >
                Edit Pockets
            </router-link>
        </li>
        <li class="mr-1">
            <router-link
                class="bg-white inline-block py-2 px-4 text-bc-blue font-semibold"
                :to="{ name: 'export' }"
                active-class="bg-bc-blue text-bc-white border-l border-t border-r rounded-t"
            >
                Export
            </router-link>
        </li>
    </ul>

    <div class="container mx-auto">
      <router-view></router-view>
    </div>
  </div>
</template>