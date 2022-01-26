<script>

    import { computed } from 'vue'

    export default {
        name: 'PocketList',
        props: {
            pocketList: {
                type: Array,
                required: true,
            },
            isEdit: {
                type: Boolean,
                required: true
            },
        },
        setup(props){
            const { pocketList } = props
            const pocketLimit = 200000
            const yearlyLimit = 400000

            const { 0:accomodationPocket, 1:cateringPocket, 2:freetimePocket } = pocketList

            const accommodationSum = computed(() => {
                return Object.values(accomodationPocket.months).reduce((carry, value) => carry + value)
            })

            const cateringSum = computed(() => {
                return Object.values(cateringPocket.months).reduce((carry, value) => carry + value)
            })

            const freetimeSum = computed(() => {
                return Object.values(freetimePocket.months).reduce((carry, value) => carry + value)
            })

            const yearlySum = computed(() => {
                return accommodationSum.value + cateringSum.value + freetimeSum.value
            })

            return {
                accommodationSum,
                cateringSum,
                freetimeSum,
                yearlySum,
                pocketLimit,
                yearlyLimit,
            }
        },
    }
</script>

<template>
    <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md mt-12">
        <table class="min-w-full border divide-y divide-gray-200 table-fixed">
            <thead>
            <tr class="">
                <template v-for="(item, index) in pocketList[0]" :key="index">
                <th v-for="(value, key) in item" :key="key" class="px-2 py-6 bg-bc-blue">
                    <div
                        class="text-xs font-medium tracking-wider leading-4 text-center text-white uppercase w-16"
                    >
                        {{ key }}
                    </div>
                </th>
                </template>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            <template v-for="(pocket, key) in pocketList" :key="key">
                <tr class="bg-white">
                    <td class="px-2 py-6 text-sm text-center leading-5 text-gray-900 whitespace-no-wrap w-20">
                        {{ pocket.common.id }}
                    </td>
                    <td class="px-2 py-6 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ pocket.common.name }}
                    </td>
                    <td v-for="(value, index) in pocket.months" :key="index" class="px-2 py-6 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        <div class="mx-auto w-24">
                            <input 
                                class="w-3/4 h-8 p-2 border border-bc-blue bg-bc-blue opacity-75 text-right text-white" type="number" min="0" v-model="pocketList[key].months[index]" placeholder="0" :disabled="!isEdit" />
                             Ft.
                        </div>
                    </td>
                </tr>
            </template>
            </tbody>
        </table>
        <div class="container mt-12 text-center space-y-4 mx-auto w-1/2">
            <div class="bg-bc-blue text-white rounded-md p-2">
                Szálláshely szolgáltatás zseb értéke: {{ accommodationSum }} / {{ pocketLimit }} Ft.-
            </div>
            <div class="bg-bc-blue text-white rounded-md p-2">
                Vendéglátás (étkezés) zseb értéke: {{ cateringSum }} / {{ pocketLimit }} Ft.-
            </div>
            <div class="bg-bc-blue text-white rounded-md p-2">
                Szabadidő zseb értéke: {{ freetimeSum }} / {{ pocketLimit }} Ft.-
            </div>
            <div class="bg-bc-blue text-white text-xl rounded-md p-6">
                Éves cafeteria értéke: {{ yearlySum }} / {{ yearlyLimit }} Ft.-
            </div>
        </div>
    </div>
</template>

<style scoped>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
      -webkit-appearance: none; 
      margin: 0; 
    }
</style>

