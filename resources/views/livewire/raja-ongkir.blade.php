<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form wire:submit.prevent="checkOngkir" class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-xl">Dari</h1>
                    <select wire:model="dariIdProvince" class="w-full rounded">
                        <option value="0">-- Pilih Provinsi --</option>
                        @foreach($dariProvinces as $province => $provinceName)
                        <option value="{{ $province }}">{{ $provinceName }}</option>
                        @endforeach
                    </select>
                    <select wire:model="dariIdCity" class="w-full rounded mt-3">
                        <option value="0">-- Pilih Kota --</option>
                        @if ($dariIdProvince > 0)
                        @foreach($dariCities as $city => $cityName)
                        <option value="{{ $city }}">{{ $cityName }}</option>
                        @endforeach
                        @endif
                    </select>

                    <h1 class="text-xl">Ke</h1>
                    <select wire:model="keIdProvince" class="w-full rounded">
                        <option value="0">-- Pilih Provinsi --</option>
                        @foreach($keProvinces as $province => $provinceName)
                        <option value="{{ $province }}">{{ $provinceName }}</option>
                        @endforeach
                    </select>
                    <select wire:model="keIdCity" class="w-full rounded mt-3">
                        <option value="0">-- Pilih Kota --</option>
                        @if ($keIdProvince > 0)
                        @foreach($keCities as $city => $cityName)
                        <option value="{{ $city }}">{{ $cityName }}</option>
                        @endforeach
                        @endif
                    </select>
                    <h1 class="text-xl">Berat</h1>
                    <input type="text" wire:model="berat" class="w-full rounded">
                    <h1 class="text-xl">Kurir</h1>
                    <select wire:model="kurir" class="w-full rounded">
                        <option value="0">-- pilih kurir --</option>
                        <option value="jne">JNE</option>
                        <option value="pos">POS</option>
                        <option value="tiki">TIKI</option>
                    </select>
                    <div class="flex justify-end">
                        <button class="px-3 py-2 rounded bg-blue-500 hover:bg-blue-600 text-white mt-3">Pilih</button>
                    </div>
                </form>
                    @if ($harga)
                    <table class="w-full mt-5">
                        <thead>
                            <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">service</th>
                                <th class="px-4 py-3">description</th>
                                <th class="px-4 py-3">cost</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr class="text-gray-700" wire:loading wire:target="checkOngkir">
                                <td class="px-4 py-3 text-ms font-semibold border" colspan="4">Loading...</td>
                            </tr>
                            @php($no = 1)
                            @foreach ($harga[0]['costs'] as $item)
                            <tr class="text-gray-700" wire:loading.remove wire:target="checkOngkir">
                                <td class="px-4 py-3 text-ms font-semibold border">{{ $no++ }}</td>
                                <td class="px-4 py-3 text-ms font-semibold border">{{ $item['service'] }}</td>
                                <td class="px-4 py-3 text-ms font-semibold border">{{ $item['description'] }}</td>
                                <td class="px-4 py-3 text-ms font-semibold border">
                                    <table class="text-left">
                                        <tr>
                                            <th>Cost</th>
                                            <td>: Rp {{ $item['cost'][0]['value'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>Etd</th>
                                            <td>: {{ $item['cost'][0]['etd'] }}</td>
                                        </tr>
                                        <tr>
                                            <th>Note</th>
                                            <td>: {{ $item['cost'][0]['note'] }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
            </div>
        </div>
    </div>
</div>
</div>