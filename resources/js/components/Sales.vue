<template>
    <div class="mx-auto min-h-[95vh] w-[90%] mt-10 flex flex-col items-center">
        <h1 class="text-3xl font-bold">Sales History</h1>
        <div class="text-lg mt-5 mr-2 self-end">
            <label>Sort By: </label>
            <select class="rounded-md border-[1px] border-gray-700 pl-2 leading-loose">
                <option value=1>Most Recent</option>
                <option value=2>Amount Spent</option>
            </select>
        </div>

        <table class="w-full border-2 border-gray-700 table-auto text-center text-xl mt-7 cursor-pointer">
            <thead>
                <tr class="leading-[3rem] font-bold">
                    <td>ID</td>
                    <td>Buyer's Name</td>
                    <td>Total</td>
                    <td>Date</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <tr class="leading-[3rem]" @mouseover="displayArrow(0)" @mouseleave="hideArrow(0)">
                    <td>1</td>
                    <td>John Doe</td>
                    <td>$100.12</td>
                    <td>12/12/2021</td>
                    <td class="hover:opacity-100 w-24" title="See More Details" ><img src="/next-arrow.png" width="16" class="inline-block opacity-0" :ref="('arrow' + 0)"/></td>
                </tr>
                <tr class="leading-[3rem]">
                    <td>1</td>
                    <td>John Doe</td>
                    <td>$100.12</td>
                    <td>12/12/2021</td>
                    <td class="hover:opacity-100 w-24" title="See More Details" ><img src="/next-arrow.png" width="16" class="inline-block opacity-0" :ref="('arrow' + 0)"/></td>
                </tr>
                <tr class="leading-[3rem]">
                    <td>1</td>
                    <td>John Doe</td>
                    <td>$100.12</td>
                    <td>12/12/2021</td>
                    <td class="hover:opacity-100 w-24" title="See More Details" ><img src="/next-arrow.png" width="16" class="inline-block opacity-0" :ref="('arrow' + 0)"/></td>
                </tr>
                <tr class="leading-[3rem]">
                    <td>1</td>
                    <td>John Doe</td>
                    <td>$100.12</td>
                    <td>12/12/2021</td>
                    <td class="hover:opacity-100 w-24" title="See More Details" ><img src="/next-arrow.png" width="16" class="inline-block opacity-0" :ref="('arrow' + 0)"/></td>
                </tr>
                <tr class="leading-[3rem]">
                    <td>1</td>
                    <td>John Doe</td>
                    <td>$100.12</td>
                    <td>12/12/2021</td>
                    <td class="hover:opacity-100 w-24" title="See More Details" ><img src="/next-arrow.png" width="16" class="inline-block opacity-0" :ref="('arrow' + 0)"/></td>
                </tr>
                <tr class="leading-[3rem]">
                    <td>1</td>
                    <td>John Doe</td>
                    <td>$100.12</td>
                    <td>12/12/2021</td>
                    <td class="hover:opacity-100 w-24" title="See More Details" ><img src="/next-arrow.png" width="16" class="inline-block opacity-0" :ref="('arrow' + 0)"/></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        methods: {
            displayArrow(index) {
                this.$refs['arrow' + index].classList.remove('opacity-0')
            },
            hideArrow(index) {
                this.$refs['arrow' + index].classList.add('opacity-0')
            }
        },
    }
</script>

<style scoped>
    tbody tr:nth-child(even) {
        @apply bg-cyan-700 text-white;
    }
    tbody tr:nth-child(odd) {
        @apply bg-cyan-600 text-gray-100;
    }
</style>