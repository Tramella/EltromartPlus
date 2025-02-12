@extends('layouts.app')
@section('content')
    <div class="flex justify-center items-center w-full h-auto">
        <div class="side-profile">
            <div class="w-full flex flex-col justify-start items-center">
                <div class="w-full flex justify-center items-center">
                    <img src="{{ asset('images/James.jpg') }}" class="img-profile" />
                </div>
                <div class="w-full mt-5 flex flex-col justify-center items-center">
                    <div class="w-full h-[60px] flex justify-center items-center mt-2 item-sideprofile active-usr"
                        onclick="toggleSection('profile-section', this) ">
                        <img src="{{ asset('images/Profile.png') }}" class="icon-userprofile" />
                        <div class="ms-3 w-50 title-userprofile flex justify-center item-center">Profile</div>
                    </div>
                    <div class="w-full h-[60px] flex justify-center items-center mt-2 item-sideprofile"
                        onclick="toggleSection('address-section', this) ">
                        <img src="{{ asset('images/Address1.png') }}" class="icon-userprofile" />
                        <div class="ms-3 w-50 title-userprofile flex justify-center item-center">Address</div>
                    </div>
                    <div class="w-full h-[60px] flex justify-center items-center mt-2 item-sideprofile"
                        onclick="toggleSection('order-section', this) ">
                        <img src="{{ asset('images/Shipped.png') }}" class="icon-userprofile" />
                        <div class="ms-3 w-50 title-userprofile flex justify-center item-center">Orders</div>
                    </div>
                    <div class="w-full h-[60px] flex justify-center items-center mt-2 item-sideprofile"
                        onclick="toggleSection('payment-section', this) ">
                        <img src="{{ asset('images/Bill.png') }}" class="icon-userprofile" />
                        <div class="ms-3 w-50 title-userprofile flex justify-center item-center">Payment</div>
                    </div>
                    <div class="w-full h-[60px] flex justify-center items-center mt-2">
                        <img src="{{ asset('images/Export.png') }}" class="icon-userprofile" />
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="ms-3 w-50 title-userprofile flex justify-center item-center">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-profile">
            {{-- Profile Section --}}
            <div class="main-contentuser" id="profile-section">
                <div class="w-full flex justify-between items-center p-2">
                    <div class="welcome-user">Welcome, User!</div>
                    <div class="time-usrprofile">Tune, 07 Jun 2023</div>
                </div>
                <div class="w-full main-contentusr">
                    <div class="main-contentu">
                        <div class="w-full flex  items-center mb-3">
                            <div class=" flex justify-center items-center mx-3">
                                <img src="{{ asset('images/James.jpg') }}" class="img-profilesmall" />
                            </div>
                            <div class="flex flex-col justify-start items-center mx-4">
                                <div class="w-full text-username">Mary Jean</div>
                                <div class="txt-emailuser">maryjean@example.com</div>
                            </div>
                        </div>
                        <div class="w-full flex flex-wrap justify-between items-center">
                            <div class="w-usrcontent flex flex-col justify-start items-center">
                                <div class="w-full text-start title-usrinput">First Name</div>
                                <input type="text" class="input-usrprofile" placeholder="Your First Name" />
                            </div>
                            <div class="w-usrcontent  flex flex-col justify-start items-center">
                                <div class="w-full text-start title-usrinput">Email Address</div>
                                <input type="text" class="input-usrprofile" placeholder="Your Email Address" />
                            </div>
                            <div class="w-usrcontent flex flex-col justify-start items-center">
                                <div class="w-full text-start title-usrinput">Last Name</div>
                                <input type="text" class="input-usrprofile" placeholder="Your Last Name" />
                            </div>
                            <div class="w-usrcontent  flex flex-col justify-start items-center">
                                <div class="w-full text-start title-usrinput">Phone Number</div>
                                <input type="text" class="input-usrprofile" placeholder="Your Phone Number" />
                            </div>
                            <div class="w-usrcontent flex flex-col justify-start items-center">
                                <div class="w-full text-start title-usrinput">Password</div>
                                <input type="password" class="input-usrprofile" placeholder="Your Password" />
                            </div>

                            <div class="w-usrcontent  flex flex-col justify-start items-center">
                                <div class="w-full text-start title-usrinput">Confirm Password</div>
                                <input type="password" class="input-usrprofile" placeholder="Your Confirm Password" />
                            </div>
                            <div class="w-usrcontent flex flex-col justify-start items-center">
                                <div class="w-full text-start title-usrinput">Gender</div>

                                <div class=" w-full p-2 flex justify-start items-center">
                                    <!-- Male radio button -->
                                    <label class="mr-6 label-gender flex items-center">
                                        <input type="radio" name="gender" value="male" class="mr-2 input-gender" />
                                        Male
                                    </label>

                                    <!-- Female radio button -->
                                    <label class="label-gender flex items-center">
                                        <input type="radio" name="gender" value="female" class="mr-2 input-gender" />
                                        Female
                                    </label>
                                </div>
                            </div>


                            <div class="w-full flex justify-center items-center mt-6">
                                <button class="btn-usrprofile">SAVE</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            {{-- Address Section --}}
            <div class="main-contentuser hidden" id="address-section">
                <div class="main-contenttable">
                    <div class="address-content">
                        <div class="w-address flex justify-end items-center">
                            <div class="add-new-address me-5">
                                <div class="txt-add-address">Add New</div>
                                <img src="{{ asset('images/Plus Math.png') }}" class="icon-add-new" />

                            </div>
                        </div>
                        <div class="w-address mt-5">
                            <table class="table w-full">
                                <thead>
                                    <tr class="thead-address">
                                        <th scope="col">No.</th>
                                        <th scope="col">Street</th>
                                        <th scope="col">Ward</th>
                                        <th scope="col">District</th>
                                        <th scope="col">District</th>
                                        <th scope="col">City/Province</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="tbody-address">
                                        <th>1</th>
                                        <td>Malcolm Lockyer</td>
                                        <td>1961</td>
                                        <td>1961</td>
                                        <td>1961</td>

                                        <td>1961</td>
                                        <td class="flex justify-center items-center">
                                            <div class="btn-address-statusd flex justify-center items-center">Default</div>
                                        </td>
                                        <td class=" flex justify-center items-center">
                                            <button class="btn-address-edit  ">Edit</button>
                                            <button class="btn-address-delete">Delete</button>
                                        </td>
                                    </tr>
                                    <tr class="tbody-address">
                                        <th>1</th>
                                        <td>Malcolm Lockyer</td>
                                        <td>1961</td>
                                        <td>1961</td>
                                        <td>1961</td>

                                        <td>1961</td>
                                        <td class="flex justify-center items-center">
                                            <div class="btn-address-statusn flex justify-center items-center">Normal</div>
                                        </td>
                                        <td class=" flex justify-center items-center">
                                            <button class="btn-address-edit  ">Edit</button>
                                            <button class="btn-address-delete">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Order Section --}}
            <div class="main-contentuser hidden" id="order-section">
                <div class="w-full flex justify-between items-center p-2">
                    <div class="address-title">Address Information</div>
                </div>
            </div>
            {{-- Payment Section --}}
            <div class="main-contentuser hidden" id="payment-section">
                <div class="w-full flex justify-between items-center p-2">
                    <div class="address-title">Address Information</div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggleSection(sectionId, clickedItem) {
            // Hide all sections
            const sections = document.querySelectorAll('.main-contentuser');
            sections.forEach(section => {
                section.style.display = 'none';
            });

            // Show the selected section
            const selectedSection = document.getElementById(sectionId);
            if (selectedSection) {
                selectedSection.style.display = 'block';
            }

            // Remove 'active' class from all items
            const menuItems = document.querySelectorAll('.item-sideprofile');
            menuItems.forEach(item => {
                item.classList.remove('active-usr');
            });

            // Add 'active' class to the clicked item
            clickedItem.classList.add('active-usr');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const profileItem = document.querySelector('[onclick="toggleSection(\'profile-section\', this)"]');
            if (profileItem) {
                profileItem.classList.add('active-usr');
                toggleSection('profile-section', profileItem);
            }
        });
    </script>
@endsection
