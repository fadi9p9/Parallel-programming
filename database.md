Table "users" {
  "id" BIGINT [pk, increment, note: 'معرف المستخدم الأساسي']
  "uuid" CHAR(36) [unique]

  "name" VARCHAR(255) [note: 'اسم المستخدم']
  "email" VARCHAR(255) [unique, note: 'البريد الإلكتروني']
  "password" VARCHAR(255) [note: 'كلمة المرور المشفرة']
  "phone" VARCHAR(20) [unique, note: 'رقم الهاتف']
  "media_id" BIGINT
  "is_phone_verified" BOOL [default: false]
  "is_active" BOOL [default: true, note: 'حالة الحساب - false يعني معلق']
  "is_temporary_password" BOOL [default: false, note: 'هل كلمة المرور مؤقتة - للموظفين الجدد']
  "password_changed_at" TIMESTAMP [note: 'تاريخ آخر تغيير لكلمة المرور']
  "last_login_at" TIMESTAMP [note: 'تاريخ آخر تسجيل دخول']
  
  "note" TEXT
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
}

Table "user_addresses" {
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]
 
  "user_id" BIGINT [not null] 
  "city_id" BIGINT
  "address_line" TEXT
  "lat" DECIMAL(10,6)
  "lng" DECIMAL(10,6)
  "is_default" BOOL [default: false]
  "label" VARCHAR(50) [note: 'home, work, other'] 
 
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
}

Ref: "users"."id" < "user_addresses"."user_id"

Table "user_otps" {
  //لا تنسى اضافة index على (user_id, type)
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]
  "user_id" BIGINT
  "otp_code" VARCHAR(10) [note: 'رمز التحقق المرسل']
  "type" user_otps_type_enum [note: 'نوع الاستخدام']
  "expires_at" TIMESTAMP [note: 'تاريخ انتهاء صلاحية الرمز']
  "verified_at" TIMESTAMP [note: 'تاريخ التحقق من الرمز']
  "is_used" BOOL [default: false]
  "attempts" INT [default: 0, note: 'عدد محاولات الإدخال']
 
  "note" TEXT
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
}

Table "roles" {
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]
  "name" VARCHAR(50) [note: 'اسم الدور']
  "description" TEXT [note: 'وصف الدور']
  "note" TEXT [note: 'ملاحظات إضافية']
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
}

Table "permissions" {
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]
  "usage_name" VARCHAR(100) [unique, note: 'اسم الاستخدام الفريد']
  "name" VARCHAR(100) [unique, note: 'اسم الصلاحية']
  "guard_name" VARCHAR(100) [unique, note: 'الـ Guard الخاص بالصلاحية']
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
}

Table "functionality_permissions" {
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]
  "name" VARCHAR(100) [note: 'اسم الصلاحية الوظيفية']
  "description" TEXT [note: 'وصف الصلاحية الوظيفية']
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
}

Table "roles_permissions" {
  "role_id" BIGINT
  "permission_id" BIGINT
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
}

Table "roles_functionality_permissions" {
  "role_id" BIGINT
  "functionality_permission_id" BIGINT
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
}

Table "functionality_permissions_permissions" {
  "functionality_permission_id" BIGINT
  "permission_id" BIGINT
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
}
Table "user_roles" {
  "user_id" BIGINT
  "role_id" BIGINT
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
}

Table "categories" {
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]

  "name" json [note: 'اسم الفئة']
  "description" json [note: 'وصف الفئة']
  "media_id" bigint

  "note" text
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
}

Table "brands" {
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]

  "name" json [note: 'اسم العلامة التجارية']
  "description" json [note: 'وصف العلامة التجارية']
  "logo_id" bigint

  "note" text
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
}

Table "products" {
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]

  "name" json [note: 'اسم المنتج']
  "description" json [note: 'وصف المنتج']
  "brand_id" BIGINT
  "is_active" bool
  "average_rating" DECIMAL(3,2) [default: 0, note: 'متوسط التقييمات']
  "discount" decimal(3,2)
  "version" BIGINT [DEFAULT : 0]

  "note" text
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
}

Table "product_media" {
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]

  "product_id" BIGINT
  "media_id" BIGINT

  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
}

Table "product_categories" {
  // قم باضافة unique(product_id, category_id)
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]

  "product_id" BIGINT
  "category_id" BIGINT

  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
}
Table "stocks" {
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]

  "product_id" BIGINT [ref: > products.id]
  "quantity" BIGINT 
  "min_quantity" BIGINT
  "warehouse_id" BIGINT
  //لا تنسى اضافة هذا الشرط لمنع تكرار المنتج في نفس المستودع
  // unique(product_id, warehouse_id)

  "note" TEXT
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
}

Table "warehouses" {
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]
  
  "name" json
  "description" json
  "is_active" bool
  "location" geometry
  "area" point
  "city_id" BIGINT
  
  "note" text
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
}

Table "cities" {
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]
  
  "name" json
  "center_lat" DECIMAL(10,8) [note: 'خط عرض مركز المدينة']
  "center_lng" DECIMAL(11,8) [note: 'خط طول مركز المدينة']
  "boundary" GEOMETRY [note: 'حدود المدينة - Polygon لرسمها على الخريطة']
  "area_km2" DECIMAL(12,2) [note: 'مساحة المدينة بالكيلومتر المربع']
  "zoom_level" TINYINT [default: 12, note: 'مستوى التكبير الافتراضي على الخريطة']
  
  "note" text
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
}

Table "media" {
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]

  "path" VARCHAR(255) [note: 'رابط الصورة']

  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
}

Table "carts" {
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]

  "user_id" BIGINT [note: 'NULL للزوار'] 
  "session_id" VARCHAR(100) [note: 'للزوار غير المسجلين']  
  "status" carts_status_enum
  "expires_at" TIMESTAMP [note: 'وقت انتهاء صلاحية السلة']  
  
  "note" TEXT
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
}

Ref: "users"."id" < "carts"."user_id"
Table "cart_items" {
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]
  "cart_id" BIGINT
  "product_id" BIGINT [ref: >products.id]
  "quantity" DECIMAL(12,2)
  "unit_price" DECIMAL(12,2)
  "total_price" DECIMAL(12,2)
  "discount_value" DECIMAL(12,2)
  "product_name" TEXT
  "final_price" DECIMAL(12,2)
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
}

Enum  orders_status_enum {
  created
  confirmed
  preparing
  out_for_delivery
  delivered
  completed
  canceled
}

Table "orders" {
  // اضافة index على idempotency_key
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]

  "user_id" BIGINT
  "order_number" BIGINT [unique]
  "status" orders_status_enum [note: 'حالة الطلب']
  "total_amount" DECIMAL(12,2)
  "otp_id" BIGINT [note: 'رمز التحقق المستخدم لتأكيد الطلب']
  "verified_at" TIMESTAMP [note: 'تاريخ تأكيد الطلب من العميل عبر OTP']
  "subtotal_amount" DECIMAL(12,2)
  "discount_total" DECIMAL(12,2)
  "grand_total" DECIMAL(12,2)
  "delivery_fee_id" BIGINT
  "delivery_fee" DECIMAL(12,2) [default: 0]
  "delivery_address_id" BIGINT [note: 'العنوان المستخدم في التوصيل']
  "idempotency_key" VARCHAR(255) [unique , note:'كل request له key إذا تكرر → نفس النتيجة']
  //قم باضافة index  على (user_id, status)
  "note" text
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" timestamp
  "completed_at" TIMESTAMP
  "canceled_at" TIMESTAMP [note: 'تاريخ الإلغاء']
  "cancellation_reason" TEXT [note: 'سبب الإلغاء']
}
Table "order_items" {
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]

  "order_id" BIGINT
  "product_id" BIGINT [ref: >products.id]
  "quantity" DECIMAL(12,2)
  "unit_price" DECIMAL(12,2)
  "total_price" DECIMAL(12,2)
  "discount_value" DECIMAL(12,2)
  "discount_type" order_items_discount_type_enum
  "final_price" DECIMAL(12,2)
  "product_name" TEXT
   "product_price" TEXT

  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
}


Table "payments" {
  // لا تنسى اضافة index على status
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]

  "order_id" BIGINT
  "amount" DECIMAL(12,2)
  "method" payments_method_enum
  "status" payments_status_enum
  "transaction_ref" VARCHAR(255)
  "currency_code" CHAR(3) [default: 'SYP']

  "note" text
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" timestamp
}

Table "orderTracking" {
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]

  "order_id" BIGINT
  "status" orders_status_enum
  "changed_by_type" orderTracking_changed_by_type_enum

  "note" text
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" timestamp
}

Table "inventory_logs" {
  "id" BIGINT [pk]

  "product_id" BIGINT [ref: >products.id]
  "change" DECIMAL(12,2)
  "type" inventory_logs_type_enum
  "source_type" inventory_logs_source_type_enum
  "source_id" BIGINT

  "note" TEXT
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
}



Table "notification_types" {
  "id" BIGINT [pk]
  "code" VARCHAR(100) [unique, note: 'STOCK_LOW, ORDER_CREATED']
  "title" json
  "description" json
  "priority" notification_types_priority_enum
  "channel" notification_types_channel_enum
  "created_at" TIMESTAMP
}

Table "notifications" {
  //index على notifiable_type + notifiable_id
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]

  "notification_type_id" BIGINT
  "notifiable_type" VARCHAR(100)
  "notifiable_id" BIGINT
  "data" json

  "created_at" TIMESTAMP
  "created_by" BIGINT
}

Table "notification_users" {
  "id" BIGINT [pk]
  "notification_id" BIGINT
  "user_id" BIGINT
  "is_read" bool
  "read_at" TIMESTAMP
  "created_at" TIMESTAMP
}

Table "user_notification_settings" {
  "id" BIGINT [pk]
  "user_id" BIGINT
  "notification_type_id" BIGINT
  "is_enabled" bool
}

Table "notification_targets" {
  "id" BIGINT [pk]
  "notification_type_id" BIGINT
  "target_type" notification_targets_target_type_enum
  "target_id" BIGINT
  "created_at" TIMESTAMP
}

Table "delivery_fees" {
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]
  "city_id" BIGINT [note: 'المدينة المستهدفة']
  "warehouse_id" BIGINT [note: 'من أي مستودع يتم الشحن']
  "delivery_type" delivery_fees_delivery_type_enum [default: 'standard', note: 'نوع التوصيل']
  "fee" DECIMAL(12,2) [note: 'تكلفة التوصيل']
  "estimated_days" INT [note: 'عدد الأيام المقدّرة لوصول الطلب']
  "is_active" BOOL [default: true]
  "note" TEXT
  "created_by" BIGINT
  "updated_by" BIGINT
  "deleted_by" BIGINT
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
  "deleted_at" TIMESTAMP
}

Table "sales_reports_cache" {
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]
  "report_date" DATE [note: 'تاريخ التقرير']
  "report_type" sales_reports_cache_report_type_enum [note: 'نوع التقرير']
  "total_sales" DECIMAL(14,2)
  "total_orders" INT
  "total_customers" INT
  "total_products_sold" INT
  "top_selling_product_id" BIGINT
  "top_selling_category_id" BIGINT
  "data" JSON [note: 'تفاصيل إضافية مجمعة (مثل قائمة أكثر المنتجات مبيعًا)']
  "created_at" TIMESTAMP
  "updated_at" TIMESTAMP
}


Ref:"media"."id" < "users"."media_id"

Ref:"users"."id" < "users"."created_by"

Ref:"users"."id" < "users"."updated_by"

Ref:"users"."id" < "users"."deleted_by"

Ref:"cities"."id" < "user_addresses"."city_id"

Ref:"users"."id" < "user_addresses"."created_by"

Ref:"users"."id" < "user_addresses"."updated_by"

Ref:"users"."id" < "user_addresses"."deleted_by"

Ref:"users"."id" < "user_otps"."user_id"

Ref:"users"."id" < "roles"."created_by"

Ref:"users"."id" < "roles"."updated_by"

Ref:"users"."id" < "roles"."deleted_by"

Ref:"users"."id" < "permissions"."created_by"

Ref:"users"."id" < "permissions"."updated_by"

Ref:"users"."id" < "permissions"."deleted_by"

Ref:"users"."id" < "functionality_permissions"."created_by"

Ref:"users"."id" < "functionality_permissions"."updated_by"

Ref:"users"."id" < "functionality_permissions"."deleted_by"

Ref:"roles"."id" < "roles_permissions"."role_id"

Ref:"permissions"."id" < "roles_permissions"."permission_id"

Ref:"users"."id" < "roles_permissions"."created_by"

Ref:"users"."id" < "roles_permissions"."updated_by"

Ref:"users"."id" < "roles_permissions"."deleted_by"

Ref:"roles"."id" < "roles_functionality_permissions"."role_id"

Ref:"functionality_permissions"."id" < "roles_functionality_permissions"."functionality_permission_id"

Ref:"users"."id" < "roles_functionality_permissions"."created_by"

Ref:"users"."id" < "roles_functionality_permissions"."updated_by"

Ref:"users"."id" < "roles_functionality_permissions"."deleted_by"

Ref:"functionality_permissions"."id" < "functionality_permissions_permissions"."functionality_permission_id"

Ref:"permissions"."id" < "functionality_permissions_permissions"."permission_id"

Ref:"users"."id" < "functionality_permissions_permissions"."created_by"

Ref:"users"."id" < "functionality_permissions_permissions"."updated_by"

Ref:"users"."id" < "functionality_permissions_permissions"."deleted_by"

Ref:"users"."id" < "user_roles"."user_id"

Ref:"roles"."id" < "user_roles"."role_id"

Ref:"users"."id" < "user_roles"."created_by"

Ref:"users"."id" < "user_roles"."updated_by"

Ref:"users"."id" < "user_roles"."deleted_by"


Ref:"media"."id" < "categories"."media_id"

Ref:"users"."id" < "categories"."created_by"

Ref:"users"."id" < "categories"."updated_by"

Ref:"users"."id" < "categories"."deleted_by"

Ref:"media"."id" < "brands"."logo_id"

Ref:"users"."id" < "brands"."created_by"

Ref:"users"."id" < "brands"."updated_by"

Ref:"users"."id" < "brands"."deleted_by"

Ref:"brands"."id" < "products"."brand_id"


Ref:"users"."id" < "products"."created_by"

Ref:"users"."id" < "products"."updated_by"

Ref:"users"."id" < "products"."deleted_by"


Ref:"products"."id" < "product_media"."product_id"

Ref:"media"."id" < "product_media"."media_id"

Ref:"products"."id" < "product_categories"."product_id"

Ref:"categories"."id" < "product_categories"."category_id"


Ref:"warehouses"."id" < "stocks"."warehouse_id"

Ref:"users"."id" < "stocks"."created_by"

Ref:"users"."id" < "stocks"."updated_by"

Ref:"users"."id" < "stocks"."deleted_by"

Ref:"cities"."id" < "warehouses"."city_id"

Ref:"users"."id" < "warehouses"."created_by"

Ref:"users"."id" < "warehouses"."updated_by"

Ref:"users"."id" < "warehouses"."deleted_by"

Ref:"users"."id" < "cities"."created_by"

Ref:"users"."id" < "cities"."updated_by"

Ref:"users"."id" < "cities"."deleted_by"

Ref:"users"."id" < "media"."created_by"

Ref:"users"."id" < "media"."updated_by"

Ref:"users"."id" < "media"."deleted_by"

Ref:"users"."id" < "carts"."created_by"

Ref:"users"."id" < "carts"."updated_by"

Ref:"users"."id" < "carts"."deleted_by"

Ref:"carts"."id" < "cart_items"."cart_id"


Ref:"user_otps"."id" < "orders"."otp_id"

Ref:"delivery_fees"."id" < "orders"."delivery_fee_id"

Ref:"user_addresses"."id" < "orders"."delivery_address_id"

Ref:"users"."id" < "orders"."created_by"

Ref:"users"."id" < "orders"."updated_by"

Ref:"users"."id" < "orders"."deleted_by"

Ref:"orders"."id" < "order_items"."order_id"


Ref:"orders"."id" < "payments"."order_id"

Ref:"users"."id" < "payments"."created_by"

Ref:"users"."id" < "payments"."updated_by"

Ref:"users"."id" < "payments"."deleted_by"

Ref:"orders"."id" < "orderTracking"."order_id"

Ref:"users"."id" < "orderTracking"."created_by"

Ref:"users"."id" < "orderTracking"."updated_by"

Ref:"users"."id" < "orderTracking"."deleted_by"


Ref:"users"."id" < "inventory_logs"."created_by"

Ref:"users"."id" < "inventory_logs"."updated_by"

Ref:"users"."id" < "inventory_logs"."deleted_by"

Ref:"users"."id" < "orders"."user_id"

Ref:"notification_types"."id" < "notifications"."notification_type_id"

Ref:"users"."id" < "notifications"."created_by"

Ref:"notifications"."id" < "notification_users"."notification_id"

Ref:"users"."id" < "notification_users"."user_id"

Ref:"users"."id" < "user_notification_settings"."user_id"

Ref:"notification_types"."id" < "user_notification_settings"."notification_type_id"

Ref:"notification_types"."id" < "notification_targets"."notification_type_id"

Ref:"cities"."id" < "delivery_fees"."city_id"

Ref:"warehouses"."id" < "delivery_fees"."warehouse_id"

Ref:"users"."id" < "delivery_fees"."created_by"

Ref:"users"."id" < "delivery_fees"."updated_by"

Ref:"users"."id" < "delivery_fees"."deleted_by"

Ref:"products"."id" < "sales_reports_cache"."top_selling_product_id"

Ref:"categories"."id" < "sales_reports_cache"."top_selling_category_id"


Enum user_otps_type_enum {
  phone_verification
  order_confirmation
  password_reset
  login_verification
}

Enum product_attributes_type_enum {
  text
  number
  boolean
  select
  multi_select
  color
}

Enum carts_status_enum {
  active
  abandoned
  converted
  expired
}

Enum cart_items_discount_type_enum {
  percentage
  fixed
}

Enum order_items_discount_type_enum {
  percentage
  fixed
}

Enum payments_method_enum {
  cash_on_delivery
  credit_card
  wallet
  bank_transfer
}

Enum payments_status_enum {
  pending
  paid
  failed
  refunded
  canceled
}

Enum orderTracking_changed_by_type_enum {
  system
  admin
  user
}

Enum inventory_logs_type_enum {
  increase
  decrease
  adjust
}

Enum inventory_logs_source_type_enum {
  order
  return
  manual
  adjustment
}

Enum discount_type_enum {
  percentage
  fixed
}

Enum notification_types_priority_enum {
  low
  medium
  high
  critical
}

Enum notification_types_channel_enum {
  database
  push
  email
  sms
}

Enum notification_targets_target_type_enum {
  user
  role
  warehouse
}

Enum delivery_fees_delivery_type_enum {
  standard
  express
  same_day
}

Enum sales_reports_cache_report_type_enum {
  daily
  weekly
  monthly
  yearly
}

Enum homepage_sections_type_enum {
  products
  categories
  banners
  html
}

Table "user_sessions" {
  "id" BIGINT [pk]
  "uuid" CHAR(36) [unique]
  "user_id" BIGINT
  "token" VARCHAR(500) [unique]
  "device_name" VARCHAR(255)
  "device_type" VARCHAR(50)
  "ip_address" VARCHAR(45)
  "user_agent" TEXT
  "expires_at" TIMESTAMP
  "last_activity_at" TIMESTAMP
  "created_at" TIMESTAMP
}

Table "login_attempts" {
  "id" BIGINT [pk]
  "user_id" BIGINT [note: 'NULL إذا لم يوجد الحساب']
  "phone" VARCHAR(20) [note: 'رقم الهاتف المستخدم'] 
  "ip_address" VARCHAR(45)
  "user_agent" TEXT  
  "success" BOOL [default: false]
  "failure_reason" VARCHAR(100) [note: 'wrong_password, account_suspended, etc'] 
  "attempted_at" TIMESTAMP
}

Ref: "users"."id" < "login_attempts"."user_id"
Ref: "users"."id" < "user_sessions"."user_id"


Enum banner_text_position_enum {
  top_left
  top_center
  top_right
  center_left
  center
  center_right
  bottom_left
  bottom_center
  bottom_right
}



Enum product_rule_type_enum {
  manual           
  newest           
  best_selling     
  most_viewed      
  highest_rated    
  on_sale          
  random           
  category_based   
  brand_based     
}



  
 

Table "performance_logs" {
  "id" BIGINT [pk]

  "endpoint" VARCHAR(255)
  "execution_time_ms" INT
  "memory_usage_kb" INT


  "created_at" TIMESTAMP
}
