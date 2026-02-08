<div class="vertical-menu">



    <div data-simplebar class="h-100">



        <!--- Sidemenu -->

        <div id="sidebar-menu">

            <!-- Left Menu Start -->

            <ul class="metismenu list-unstyled" id="side-menu">





                <li>

                    <a href="<?php echo e(URL('/Dashboard')); ?>" class="waves-effect">

                        <i class="bx bx-home-circle"></i>

                        <span key="t-dashboards">Dashboards</span>

                    </a>



                </li>





            
                <li>

                    <a href="<?php echo e(URL('/Invoice')); ?>" class="waves-effect">

                        <i class="mdi mdi-airplane text-success "></i>

                        <span key="t-calendar">Invoice</span>

                    </a>

                </li>
                
                
                <li>

                    <a href="<?php echo e(route('umrah-invoice-master.index')); ?>" class="waves-effect">

                        <i class="fas fa-kaaba font-size-16 text-warning "></i>

                        <span key="t-calendar">Voucher</span>

                    </a>

                </li>
                
                
                



                


                    <li>

                    <a href="<?php echo e(URL('/Estimate')); ?>" class="waves-effect">

                        <i class="bx bx-receipt"></i>

                        <span key="t-calendar">Quotation</span>

                    </a>

                </li>
 
   
          

 <li>

                    <a href="javascript: void(0);" class="has-arrow waves-effect">

                        <i class="mdi mdi-finance"></i>

                        <span key="t-ecommerce">Accounts</span>

                    </a>

                    <ul class="sub-menu" aria-expanded="false">


                        <li> <a href="<?php echo e(URL('/Voucher')); ?>" key="t-products">Voucher</a></li>
                        <li> <a href="<?php echo e(URL('/Expense')); ?>" key="t-products">Expenses</a></li>
                        <li> <a href="<?php echo e(URL('/PettyCash')); ?>" key="t-products">PettyCash</a></li>
                        <li> <a href="<?php echo e(URL('/ChartOfAcc')); ?>" key="t-products">Chart of Account</a></li>
                        <li> <a href="<?php echo e(URL('/AdjustmentBalance')); ?>" key="t-products">Adjustment Balance</a></li>
                     



                    </ul>

                </li>


            





                <li>

                    <a href="javascript: void(0);" class="has-arrow waves-effect">

                        <i class="mdi mdi-finance"></i>

                        <span key="t-ecommerce">Party Reports</span>

                    </a>

                    <ul class="sub-menu" aria-expanded="false">





                        <li> <a href="<?php echo e(URL('/PartyLedger')); ?>" key="t-products">Party Ledger</a></li>

                        <li><a href="<?php echo e(URL('/PartyBalance')); ?>" key="t-products">Party Balance</a></li>

                        <li><a href="<?php echo e(URL('/PartyYearlyBalance')); ?>" key="t-products">Yearly Report</a></li>

                        <li><a href="#" key="t-products">Ageing Report</a></li>

                        <li><a href="#" key="t-products">Party Analysis</a></li>

                        <li><a href="<?php echo e(URL('/PartyList')); ?>" key="t-products">Party List</a></li>

                        <li><a href="<?php echo e(URL('/PartyWiseSale')); ?>" key="t-products">Partywise Sale</a></li>

                        <li><a href="<?php echo e(URL('/OutStandingInvoice')); ?>" key="t-products">Outstanding Invoices</a></li>





                    </ul>

                </li>





                <li>

                    <a href="javascript: void(0);" class="has-arrow waves-effect">

                        <i class="mdi mdi-chart-areaspline"></i>

                        <span key="t-ecommerce">Supplier Reports</span>

                    </a>

                    <ul class="sub-menu" aria-expanded="false">





                        <li> <a href="<?php echo e(URL('/SupplierLedger')); ?>" key="t-products">Supplier Ledger</a></li>

                        <li> <a href="<?php echo e(URL('/SupplierBalance')); ?>" key="t-products">Supplier Balance</a></li>

                        <li> <a href="<?php echo e(URL('/Invoice')); ?>" key="t-products">Sale Invoice</a></li>

                        <li> <a href="<?php echo e(URL('/TicketRegister')); ?>" key="t-products">Ticket Register</a></li>

                        <li> <a href="<?php echo e(URL('/AirlineSummary')); ?>" key="t-products">Airline Summary</a></li>
                        <li> <a href="<?php echo e(URL('/ItemWiseSale')); ?>" key="t-products">Itemwise Report</a></li>

                        <li> <a href="<?php echo e(URL('/SalemanReport')); ?>" key="t-products">Sales Man Report</a></li>
                        <li> <a href="<?php echo e(URL('/SalemanInvoiceBalance')); ?>" key="t-products">Saleman Invoice Balance</a></li>

                        <li> <a href="<?php echo e(URL('/TaxReport')); ?>" key="t-products">Tax Report</a></li>

                        <li> <a href="<?php echo e(URL('/SupplierWiseSale')); ?>" key="t-products">Sales Report</a></li>
                        <li> <a href="<?php echo e(URL('/UmrahReport')); ?>" key="t-products">Umrah Report</a></li>
                        <li> <a href="<?php echo e(URL('/Log')); ?>" key="t-products">User's Log</a></li>





                    </ul>

                </li>





                <li>

                    <a href="javascript: void(0);" class="has-arrow waves-effect">

                        <i class="mdi mdi-chart-bell-curve-cumulative"></i>

                        <span key="t-ecommerce">Account Reports</span>

                    </a>

                    <ul class="sub-menu" aria-expanded="false">





                        <li><a key="t-products" href="<?php echo e(URL('/CashbookReport')); ?>">Cash Book</a></li>

 
                        <li><a key="t-products" href="<?php echo e(URL('/DaybookReport')); ?>">Day book</a></li>

                        <li><a key="t-products" href="<?php echo e(URL('/GeneralLedger')); ?>">General Ledger</a></li>

                        <li><a key="t-products" href="<?php echo e(URL('/TrialBalance')); ?>">Trial Balance</a></li>

                        <li><a key="t-products" href="<?php echo e(URL('/TrialBalanceActivity')); ?>">Trial with acitivity</a></li>

                        <li><a key="t-products" href="#">yearly summary</a></li>

                        <li><a key="t-products" href="<?php echo e(URL('/ProfitAndLoss')); ?>">profit and loss</a></li>

                        <li><a key="t-products" href="<?php echo e(URL('/BalanceSheet')); ?>">balance sheet</a></li>

                        <li><a key="t-products" href="<?php echo e(URL('/PartyBalance')); ?>">party balance</a></li>

                        <li><a key="t-products" href="#">ageing report</a></li>

                        <li><a key="t-products" href="#">cash flow</a></li>

                        <li><a key="t-products" href="<?php echo e(URL('/TaxReport')); ?>">tax report</a></li>
                        <li><a key="t-products" href="<?php echo e(URL('/ReconcileReport')); ?>">Bank Reconciliation</a></li>




                        <li><a key="t-products" href="<?php echo e(URL('/InvoiceSummary')); ?>">invoice summary list</a></li>

                        <li><a key="t-products" href="<?php echo e(URL('/TicketRegister')); ?>">Invoice Detail</a></li>





                    </ul>

                </li>

                    <li>

                    <a href="javascript: void(0);" class="has-arrow waves-effect">

                        <i class="mdi mdi-finance"></i>

                        <span key="t-ecommerce">Settings</span>

                    </a>

                    <ul class="sub-menu" aria-expanded="false">





                        <li> <a href="<?php echo e(URL('/Item')); ?>" key="t-products"> Item</a></li>
                        <li> <a href="<?php echo e(URL('/Parties')); ?>" key="t-products"> Parties / Cusomters</a></li>
                        
                        <li> <a href="<?php echo e(URL('/User')); ?>" key="t-products"> User</a></li>
                        <li><a href="<?php echo e(route('hotel.index')); ?>">Hotels</a></li>
                        <li><a href="<?php echo e(route('location.index')); ?>">Locations</a></li>
                        <li><a href="<?php echo e(route('hoteltariff.index')); ?>">Hotel Tariff</a></li>
                        <li><a href="<?php echo e(route('transporttariff.index')); ?>">Transport Tariff</a></li>
                        <li><a href="<?php echo e(route('visatariff.index')); ?>">Visa Tariff</a></li>
                        <li><a href="<?php echo e(route('sector.index')); ?>">Sector</a></li>
                        <li><a href="<?php echo e(route('shirka.index')); ?>">Shirka</a></li>
                        <li><a href="<?php echo e(route('packages.index')); ?>">Packages</a></li>
                        <li><a href="<?php echo e(route('voucher-content.index')); ?>">Voucher Content</a></li>


                         





                    </ul>

                </li>


         

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-shopping-outline"></i>
                        <span key="t-ecommerce">CRM Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">


                        <li> <a href="<?php echo e(URL('/campaigns')); ?>" key="t-products">Compaigns</a></li>
                        <li> <a href="<?php echo e(URL('/branches')); ?>" key="t-products">Branches</a></li>
                        <li> <a href="<?php echo e(URL('/Company')); ?>" key="t-products">Company</a></li>
<!--                         <li> <a href="<?php echo e(URL('/User')); ?>" key="t-products">Staff</a></li>
                         <li> <a href="<?php echo e(URL('/services')); ?>" key="t-products">Serivces</a></li>
                        <li> <a href="<?php echo e(URL('/subServices')); ?>" key="t-products">Sub Services</a></li>
                        <li> <a href="<?php echo e(URL('/statuses')); ?>" key="t-products">Leads Status</a></li>
                        <li> <a href="<?php echo e(URL('/qualifiedStatuses')); ?>" key="t-products">Qualified Status</a></li>
                        <li> <a href="<?php echo e(URL('/User')); ?>" key="t-products">User</a></li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                 <i class="mdi mdi-folder font-size-16 text-warning me-2"></i> -->
                                
                        </li>

                    </ul>
                </li>







                
                
                <li>

                    <a href="<?php echo e(URL('/Logout')); ?>" class="waves-effect">

                        <i class="bx bx-power-off"></i>

                        <span key="t-calendar">Logout</span>

                    </a>

                </li>







            </ul>

        </div>

        <!-- Sidebar -->

    </div>

</div><?php /**PATH /home/u790884004/domains/xtbooks.cloud/public_html/rotana_sky/resources/views/template/sidebar.blade.php ENDPATH**/ ?>