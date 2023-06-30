<x-layout title="Location {{ $rentalItem->name }} - Le Polar">
    <div class="bg-tertiary w-screen flex flex-col p-4 sm:p-10 md:p-16 lg:p-24 min-h-screen">
        <h2 class="text-4xl font-semibold">Location de '{{ $rentalItem->name  }}'</h2>
        <span class="flex gap-2 items-center">
            <x-heroicon-o-currency-euro class="w-8 h-8 text-primary"/>
            <h4 class="text-2xl text-primary">{{ $rentalItem->price }}€ / j</h4>
        </span>

        <span class="flex gap-2 items-center">
            <svg class="w-8 h-8 text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor"><path d="M 9.3125 4 C 8.558594 4 7.90625 4.367188 7.3125 4.875 C 6.71875 5.382813 6.171875 6.066406 5.6875 6.9375 C 4.71875 8.683594 4 11.132813 4 14.1875 C 4 15.753906 4.363281 17.367188 5.09375 18.65625 C 5.253906 18.9375 5.515625 19.125 5.71875 19.375 C 5.175781 20.039063 4.28125 21.28125 4.28125 21.28125 L 5.71875 22.71875 C 5.71875 22.71875 6.710938 21.351563 7.34375 20.59375 C 7.746094 20.765625 8.125 21 8.59375 21 C 10.308594 21 12.097656 20.25 13.75 19.3125 C 14.28125 19.71875 14.878906 20 15.5 20 C 17.554688 20 19.117188 18.792969 20.21875 17.71875 C 20.539063 17.40625 20.753906 17.175781 21 16.90625 C 20.996094 17.179688 20.988281 17.429688 21.0625 17.75 C 21.121094 17.992188 21.1875 18.292969 21.4375 18.5625 C 21.6875 18.832031 22.136719 19 22.5 19 C 23.230469 19 23.652344 18.664063 24.09375 18.34375 C 24.535156 18.023438 24.953125 17.640625 25.40625 17.28125 C 26.316406 16.5625 27.285156 16 28 16 L 28 14 C 26.414063 14 25.175781 14.9375 24.1875 15.71875 C 23.71875 16.089844 23.296875 16.414063 22.96875 16.65625 C 22.96875 16.601563 22.96875 16.589844 22.96875 16.53125 C 22.980469 16.167969 23.035156 15.761719 22.96875 15.3125 C 22.9375 15.089844 22.863281 14.855469 22.65625 14.5625 C 22.449219 14.269531 21.984375 14 21.59375 14 C 21.03125 14 20.824219 14.242188 20.625 14.40625 C 20.425781 14.570313 20.277344 14.738281 20.09375 14.9375 C 19.726563 15.335938 19.289063 15.816406 18.8125 16.28125 C 17.972656 17.101563 16.984375 17.722656 15.90625 17.875 C 16.621094 17.300781 17.339844 16.730469 17.84375 16.09375 C 18.507813 15.257813 19 14.40625 19 13.40625 C 19 12.84375 18.929688 12.074219 18.5 11.34375 C 18.070313 10.613281 17.144531 10 16 10 C 14.769531 10 13.648438 10.605469 12.96875 11.5625 C 12.289063 12.519531 12 13.746094 12 15.1875 C 12 16.167969 12.222656 16.980469 12.53125 17.6875 C 11.140625 18.417969 9.699219 19 8.59375 19 C 10.285156 16.464844 12 13.011719 12 8.8125 C 12 7.941406 12.007813 6.914063 11.71875 5.96875 C 11.574219 5.496094 11.34375 5.015625 10.9375 4.625 C 10.53125 4.234375 9.929688 4 9.3125 4 Z M 9.3125 6 C 9.492188 6 9.5 6.035156 9.5625 6.09375 C 9.625 6.152344 9.699219 6.296875 9.78125 6.5625 C 9.941406 7.089844 10 7.980469 10 8.8125 C 10 12.355469 8.484375 15.457031 6.96875 17.78125 C 6.933594 17.722656 6.878906 17.71875 6.84375 17.65625 C 6.324219 16.746094 6 15.421875 6 14.1875 C 6 11.441406 6.65625 9.3125 7.4375 7.90625 C 7.828125 7.203125 8.230469 6.6875 8.59375 6.375 C 8.957031 6.0625 9.265625 6 9.3125 6 Z M 16 12 C 16.554688 12 16.636719 12.132813 16.78125 12.375 C 16.925781 12.617188 17 13.066406 17 13.40625 C 17 13.65625 16.789063 14.238281 16.28125 14.875 C 15.839844 15.429688 15.167969 16.003906 14.4375 16.5625 C 14.261719 16.160156 14 15.867188 14 15.1875 C 14 14.027344 14.246094 13.179688 14.59375 12.6875 C 14.941406 12.195313 15.332031 12 16 12 Z M 4 26 L 4 28 L 28 28 L 28 26 Z"></path></svg>
            <h4 class="text-2xl text-primary">{{ $rentalItem->deposit }}€ de caution</h4>
        </span>

        <p class="mt-10">{{ $rentalItem->description }}</p>

        <div id="calendar" class=" self-center mt-12"></div>
        @error('date')
        <span class="text-red-600 block">
                <x-heroicon-o-exclamation class="w-4 h-4 inline-block"/>
                {{ $message }}</span>
        @enderror

        <form class="mt-12" action="{{ route('rentals.store') }}" method="POST">
            @csrf
            <input hidden name="date" type="date" id="date" value=""/>
            <input hidden name="rentalItem" type="text" value="{{ $rentalItem->id }}"/>
            <div>
                <label>
                    <span class="block mb-1 @error('quantity') text-red-600 @enderror">Quantité (max {{$rentalItem->quantity}})</span>
                    <input name="quantity" type="number" max="{{ $rentalItem->quantity }}" min="1" class="w-24 focus:border-transparent focus:ring focus:ring-primary @error('quantity') border-red-600 text-red-600 @enderror">
                    @error('quantity')
                    <span class="text-red-600 block">
                        <x-heroicon-o-exclamation class="w-4 h-4 inline-block"/>
                        {{ $message }}</span>
                    @enderror
                </label>
            </div>
            <div class="flex flex-col items-end gap-1">
                <label>
                    <input required type="checkbox" name="cgl" class="text-primary focus:border-transparent focus:ring focus:ring-primary @error('cgl') border-red-600 @enderror">
                    <span class="ml-2 @error('cgl') text-red-600 @enderror">J'accepte les <a href="https://google.com" class="text-primary underline">conditions générales de location du matériel</a></span>
                    @error('cgl')
                    <span class="text-red-600 block">
                        <x-heroicon-o-exclamation class="w-4 h-4 inline-block"/>
                        {{ $message }}</span>
                    @enderror
                </label>
                <input type="submit" value="réserver" class="text-white bg-primary px-4 py-1 border outline-none rounded-lg focus:ring-offset-2 focus:ring-2 ring-primary cursor-pointer hover:bg-red-900 transition">
            </div>
        </form>
    </div>

    @if (session('success'))
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

        <script>
            window.Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                close: true,
                gravity: "bottom",
                position: "right",
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                stopOnFocus: true,
            }).showToast();
        </script>
    @endif

    <script>
        const weekDayStringToJsNum = {
            monday: 1,
            tuesday: 2,
            wednesday: 3,
            thursday: 4,
            friday: 5,
            saturday: 6,
            sunday: 0,
        }

        const rentals = @json($rentalItem->rentals);
        let selectedDate = "";

        // on document ready
        document.onreadystatechange = () => {
            if (document.readyState === 'complete') {
                const {Calendar, dayGridPlugin, interactionPlugin} = window.calendarVars;

                let calendar = new Calendar(document.getElementById("calendar"), {
                        plugins: [dayGridPlugin, interactionPlugin],
                        initialView: 'dayGridMonth',
                        height: 'auto',
                        firstDay: 1,
                        locale: 'fr',
                        dateClick: ({date}) => {
                            selectedDate = date.toDateString();
                            calendar.next()
                            calendar.prev()

                            console.log(window.moment(date).format("yyyy-MM-DD"))

                            // set date input value
                            const dateInput = document.getElementById("date");
                            dateInput.value = window.moment(date).format("yyyy-MM-DD");
                        },
                        dayCellClassNames: ({date}) => {
                            // check if there is a rental for this day
                            const dayRentals = rentals.filter(rental => {
                                const rentalDate = new Date(rental.date);
                                return rentalDate.toDateString() === date.toDateString();
                            });
                            if (dayRentals && dayRentals.reduce((total, rental) => total += rental.count, 0) >= {{ $rentalItem->quantity }}) {
                                return '!bg-red-500 text-white';
                            }

                            // check if selected
                            if (selectedDate === date.toDateString()) {
                                return '!bg-blue-500 text-white';
                            }

                            return 'bg-white text-black';
                        },
                        dayCellContent: ({date, dayNumberText}) => {
                            const dayRentals = rentals.filter(rental => {
                                const rentalDate = new Date(rental.date);
                                return rentalDate.toDateString() === date.toDateString();
                            });

                            const number = document.createElement("a");
                            number.classList.add("fc-daygrid-day-number");
                            number.innerHTML = dayNumberText;
                            let totalHtml = number.outerHTML;

                            if (dayRentals) {
                                totalHtml += `<div class="text-lg">${dayRentals.reduce((total, rental) => total += rental.count, 0)}/{{ $rentalItem->quantity }}</div>`;
                            } else {
                                totalHtml += `<div class="text-lg text-gray-300">0/{{ $rentalItem->quantity }}</div>`;
                            }
                            return {
                                html: totalHtml
                            }
                        }
                    }
                )
                calendar.render();
            }
        }
    </script>
</x-layout>
