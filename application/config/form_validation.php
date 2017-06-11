<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$config = array(
    'login' => array(
        array(
            'field' => 'username',
            'label' => 'اسم الدخول',
            'rules' => 'required',
            'errors' => array(
                'required' => 'لابد من ادخال %s'
            )
        ),
        array(
            'field' => 'password',
            'label' => 'كلمة المرور',
            'rules' => 'trim|required',
            'errors' => array(
                'required' => 'لابد من ادخال %s'
            )
        )
    ),
    // validate the property owner
    'property_owner' => array(
        // owner name 
        array(
            'field' => 'owner_name',
            'label' => 'اسم المالك',
            'rules' => 'required',
            'errors' => array(
                'required' => '%s مطلوب'
            )
        ),
        // owner phone
        array(
            'field' => 'owner_phone',
            'label' => 'رقم الهاتف',
            'rules' => 'required|regex_match[/^01[0-2]\d{8}$/]',
            'errors' => array(
                'required' => '%s مطلوب',
                'regex_match' => '%s غير صحيح'
            )
        ),
        // owner_state_id
        array(
            'field' => 'owner_state_id',
            'label' => 'المحافظة',
            'rules' => 'greater_than[0]',
            'errors' => array(
                'greater_than' => 'لابد من اختيار %s'
            )
        ),
        // owner_area_id
        array(
            'field' => 'owner_area_id',
            'label' => 'المنطقة',
            'rules' => 'greater_than[0]',
            'errors' => array(
                'greater_than' => 'لابد من اختيار %s'
            )
        )
    ),
    //--------------------------------------------------------------
    // validate basic property
    'property' => array(
        array(
            'field' => 'property_type',
            'label' => 'نوع الوحدة',
            'rules' => 'greater_than[0]',
            'errors' => array(
                'greater_than' => 'لابد من اختيار %s'
            )
        ),
        /*
        array(
            'field' => 'building_type',
            'label' => 'نوع المبني',
            'rules' => 'greater_than[0]',
            'errors' => array(
                'greater_than' => 'لابد من اختيار %s'
            )
        ),
         
         */
        /* 
        array(
                'field' => 'tower_side',
         'label' => 'الموقع من المبني',
         'rules' => 'greater_than[0]',
         'errors' => array(
                    'greater_than' => 'لابد من اختيار %s'
                )
            ),         
         */
        array(
            'field' => 'floor',
            'label' => 'رقم الدور',
            'rules' => 'required|is_natural',
            'errors' => array(
                'required' => '%s مطلوب', 
                'is_natural' => '%s لابد ان يكون رقم'
            )
        ),
        array(
            'field' => 'floors_num',
            'label' => 'عدد الادوار',
            'rules' => 'required|is_natural',
            'errors' => array(
                'required' => '%s مطلوب',
                'is_natural' => '%s لابد ان يكون رقم'
            )
        ),
        array(
            'field' => 'state_id',
            'label' => 'المحافظة',
            'rules' => 'greater_than[0]',
            'errors' => array(
                'greater_than' => 'لابد من اختيار %s'
            )
        ),
        // owner_area_id
        array(
            'field' => 'area_id',
            'label' => 'المنطقة',
            'rules' => 'greater_than[0]',
            'errors' => array(
                'greater_than' => 'لابد من اختيار %s'
            )
        ),
        array(
            'field' => 'street',
            'label' => 'العنوان',
            'rules' => 'required',
            'errors' => array(
                'required' => '%s  مطلوب'
            )
        )
    ),
    //-------------------------------------------------------------
    // validate the property layout
    'property_layout' => array(
        array(
            'field' => 'area',
            'label' => 'المساحة',
            'rules' => 'is_natural',
            'errors' => array(
                'is_natural' => '%s  لابد ان يكون رقم'
            )
        ),
        array(
            'field' => 'bedroom',
            'label' => 'غرف النوم',
            'rules' => 'is_natural',
            'errors' => array(
                'is_natural' => '%s  لابد ان يكون رقم'
            )
        ),array(
            'field' => 'bathroom',
            'label' => 'عدد الحمامات',
            'rules' => 'is_natural',
            'errors' => array(
                'is_natural' => '%s  لابد ان يكون رقم'
            )
        )
    ),
    //-------------------------------------------------------------
    // validate the property details
    'property_details' => array(
        array(
            'field' => 'finishing',
            'label' => 'نوع التشطيب',
            'rules' => 'greater_than[0]',
            'errors' => array(
                'greater_than' => 'لابد من اختيار %s'
            )
        ),
        array(
                'field' => 'gauge_water',
                'label' => 'نوع عداد المياه',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'لابد من اختيار %s'
                )
            ),
        array(
                'field' => 'gauge_electricity',
                'label' => 'نوع عداد الكهرباء',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'لابد من اختيار %s'
                )
            ),
        array(
                'field' => 'gauge_gase',
                'label' => 'نوع عداد الغاز',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'لابد من اختيار %s'
                )
            )
    ),
    //--------------------------------------------------------------
    'property_save' => array(
        array(
                'field' => 'requested_price',
                'label' => 'السعر المطلوب',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s مطلوب'
                )
            ),
        array(
                'field' => 'commission',
                'label' => 'العمولة المتفق عليها',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s مطلوب'
                )
            ),
        
        /*array(
                'field' => 'payment_method',
                'label' => 'طريقة الدفع',
                'rules' => 'required',
                'errors' => array(
                    'required' => '%s مطلوب'
                )
            ),         
         */
    ),
    //--------------------------------------------------------------
    'tower_owner' =>array(
        array(
            'field' => 'owner_name',
            'label' => 'اسم المالك',
            'rules' => 'required',
            'errors' => array(
                'required' => '%s مطلوب'
            )
        ),
        array(
            'field' => 'owner_phone',
            'label' => 'رقم هاتف المالك',
            'rules' => 'required|regex_match[/^01[0-2]\d{8}$/]',
            'errors' => array(
                'required' => '%s مطلوب',
                'regex_match' => '%s غير صحيح'
            )
        )
    ),
    //--------------------------------------------------------------------------
    'tower_location' => array(
        array(
            'field' => 'tower_name',
            'label' => 'اسم البرج',
            'rules' => 'required',
            'errors' => array(
                'required' => '%s مطلوب'
            )
        ),
        array(
            'field' => 'state_id',
            'label' => 'المحافظة',
            'rules' => 'greater_than[0]',
            'errors' => array(
                'greater_than' => 'لابد من اختيار %s'
            )
        ),
        // area_id
        array(
            'field' => 'area_id',
            'label' => 'المنطقة',
            'rules' => 'greater_than[0]',
            'errors' => array(
                'greater_than' => 'لابد من اختيار %s'
            )
        ),
        
        array(
            'field' => 'street',
            'label' => 'العنوان',
            'rules' => 'required',
            'errors' => array(
                'required' => '%s مطلوب'
            )
        )
    ),
    //--------------------------------------------------------------------------
    'tower_garage_data' => array(
        array(
            'field' => 'garage_price',
            'label' => 'سعر الجراج',
            'rules' => 'required',
            'errors' => array(
                'required' => '%s مطلوب'
            )
        ),
        array(
            'field' => 'garage_type',
            'label' => 'نوع الجراج',
            'rules' => 'required',
            'errors' => array(
                'required' => '%s مطلوب'
            )
        ),
        array(
            'field' => 'garage_commission',
            'label' => 'عمولة تسويق الجراج',
            'rules' => 'required',
            'errors' => array(
                'required' => '%s مطلوب'
            )
        )
    ), // end of tower_garage_data
    //-------------------------------------------------------------------------
    'tower_mezzanine_data' => array(
        array(
            'field' => 'mezzanine_commission',
            'label' => 'عمولة تسويق دور الميزانين',
            'rules' => 'required',
            'errors' => array(
                'required' => '%s مطلوب'
            )
        ),
        array(
            'field' => 'mezzanine_area[]',
            'label' => 'مساحة الميزانين',
            'rules' => 'required',
            'errors' => array(
                'required' => 'لابد من ادخال جميع %s'
            )
        ),
        array(
            'field' => 'mezzanine_price[]',
            'label' => 'سعر الميزانين',
            'rules' => 'required',
            'errors' => array(
                'required' => 'لابد من ادخال جميع %s'
            )
        )
        
    ), // end of tower_mezzanine_data
    //--------------------------------------------------------------------------
    'tower_units' => array(
        array(
            'field' => 'managerial_units_commission',
            'label' => 'عمولة تسويق الوحدات الادارية',
            'rules' => 'required',
            'errors' => array(
                'required' => 'لابد من ادخال %s'
            )
        ),
        array(
            'field' => 'units_area[]',
            'label' => 'مساحة الوحدات الادارية',
            'rules' => 'required',
            'errors' => array(
                'required' => 'لابد من ادخال جميع %s'
            )
        ),
        array(
            'field' => 'units_price[]',
            'label' => 'سعر الوحدات الادارية',
            'rules' => 'required',
            'errors' => array(
                'required' => 'لابد من ادخال جميع %s'
            )
        )
        
    ), // end of tower_units
    //--------------------------------------------------------------------------
    'tower_shops' =>array(
        array(
            'field' => 'shop_commission',
            'label' => 'عمولة تسويق المحلات',
            'rules' => 'required',
            'errors' => array(
                'required' => '%s مطلوبة'
            )
        ),
        array(
            'field' => 'shop_area[]',
            'label' => 'مساحة المحلات',
            'rules' => 'required',
            'errors' => array(
                'required' => '%s مطلوبة'
            )
        ),
        array(
            'field' => 'shop_price[]',
            'label' => 'سعر المحلات',
            'rules' => 'required',
            'errors' => array(
                'required' => '%s مطلوب'
            )
        ),
        array(
            'field' => 'entrance_width[]',
            'label' => 'مقاس دخلة المحل',
            'rules' => 'required',
            'errors' => array(
                'required' => '%s مطلوب'
            )
        ),
        array(
            'field' => 'shop_gauge_water[]',
            'label' => 'نوع عداد المياة',
            'rules' => 'greater_than[0]',
            'errors' => array(
                'greater_than' => 'لابد من اختيار %s'
            )
        ),
        array(
            'field' => 'shop_gauge_electricity[]',
            'label' => 'نوع عداد الكهرباء',
            'rules' => 'greater_than[0]',
            'errors' => array(
                'greater_than' => 'لابد من اختيار %s'
            )
        ),
        array(
            'field' => 'shop_gauge_gase[]',
            'label' => 'نوع عداد الغاز',
            'rules' => 'greater_than[0]',
            'errors' => array(
                'greater_than' => 'لابد من اختيار %s'
            )
        ),
        array(
            'field' => 'shop_payment_method[]',
            'label' => 'طريقة السداد',
            'rules' => 'greater_than[0]',
            'errors' => array(
                'greater_than' => 'لابد من اختيار %s'
            )
        )
    ), // end of tower_shops
    //--------------------------------------------------------------------------
    'tower_flat' => array(
        array(
            'field' => 'floors_no',
            'label' => 'عدد الادوار السكنية',
            'rules' => 'required',
            'errors' => array(
                'required' => 'لابد من ادخال %s'
            )
        ),
        array(
            'field' => 'license_limit',
            'label' => 'عدد ادوار الرخصة',
            'rules' => 'required',
            'errors' => array(
                'required' => 'لابد من ادخال %s'
            )
        ),
        array(
            'field' => 'flat_no',
            'label' => 'عدد النماذج',
            'rules' => 'required',
            'errors' => array(
                'required' => 'لابد من ادخال %s'
            )
        ),
        array(
            'field' => 'flat_commission',
            'label' => 'عمولة تسويق الشقة',
            'rules' => 'required',
            'errors' => array(
                'required' => '%s مطلوبة'
            )
        ),
        array(
            'field' => 'flat_price[]',
            'label' => 'اسعار الوحدات',
            'rules' => 'required',
            'errors' => array(
                'required' => 'لابد من ادخال %s'
            )
        ),
        array(
            'field' => 'flat_area[]',
            'label' => 'مساحة الوحدات',
            'rules' => 'required',
            'errors' => array(
                'required' => 'لابد من ادخال %s'
            )
        ),
        array(
            'field' => 'flat_finishing[]',
            'label' => 'نوع التشطيب',
            'rules' => 'greater_than[0]',
            'errors' => array(
                'greater_than' => 'لابد من اختيار %s لكل الوحدات'
            )
        ),
        array(
            'field' => 'bedroom[]',
            'label' => 'غرف النوم',
            'rules' => 'required',
            'errors' => array(
                'required' => 'لابد من ادخال عدد %s'
            )
        ),
        array(
            'field' => 'bathroom[]',
            'label' => 'الحمامات',
            'rules' => 'required',
            'errors' => array(
                'required' => 'لابد من ادخال %s'
            )
        ),
        array(
            'field' => 'flat_gauge_water[]',
            'label' => 'عداد المياة',
            'rules' => 'greater_than[0]',
            'errors' => array(
                'greater_than' => 'لابد من اختيار نوع %s'
            )
        ),
        array(
            'field' => 'flat_gauge_electricity[]',
            'label' => 'عداد الكهرباء',
            'rules' => 'greater_than[0]',
            'errors' => array(
                'greater_than' => 'لابد من اختيار نوع %s'
            )
        ),
        array(
            'field' => 'flat_gauge_gase[]',
            'label' => 'عداد الغاز',
            'rules' => 'greater_than[0]',
            'errors' => array(
                'greater_than' => 'لابد من اختيار نوع %s'
            )
        ),
        array(
            'field' => 'flat_payment_method[]',
            'label' => 'طريقة السداد',
            'rules' => 'greater_than[0]',
            'errors' => array(
                'greater_than' => 'لابد من اختيار %s'
            )
        )
        
    ), // end of tower_flat
    //--------------------------------------------------------------------------
);
