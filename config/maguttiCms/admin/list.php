<?php
return [
	/**
	* Generic values are filled when when neither package was able to guess out the value.
	*
	* @var array
	*/
	'item_per_pages' => 25,
	'section' => [

		'articles' => [
            'model' => 'Article',
            'title' => 'Pages',
            'icon' => 'newspaper-o',
            'fieldLabel' => 'ID,Parent,Image,Title,Slug,Pub,Menu,Sort,Created At,Updated At',
            'field' => ['id',
                'parent' => ['type' => 'relation', 'relation' => 'parent', 'field' => 'title'],
                'image'  => ['type' => 'image', 'field' => 'image'],
                'title'  => ['type' => 'text', 'field' => 'title',' orderable'=>true],
                'slug'   => ['type' => 'text', 'field' => 'slug',' orderable'=>true],
                'pub' => ['type' => 'boolean', 'field' => 'pub','editable' => true],
                'top_menu' => ['type' => 'boolean', 'field' => 'top_menu','editable' => true],
                'sort' => ['type' => 'editable', 'field' => 'sort', 'orderable'=>true],

                'created_at' => ['type' => 'date', 'field' => 'created_at', 'orderable'=>true],
                'updated_at' => ['type' => 'date', 'field' => 'updated_at', 'orderable'=>true],
            ],
            'field_searchable' => [
                /*
                 * This is the 'relation' version which builds a dropdown input for the corresponding relation.
                 * It should be only used when there are only a few records to show.
                 */
                'parent_id' => [
                    'label'    => 'parent',
                    'type'     => 'relation',
                    'model'    => 'article',
                    'relation' => 'parent',
                    'value'    => 'id',
                    'field'    => 'title',
                    'where'    => 'parent_id = 0',
                    'cssClass' => 'selectize',
                ],
                /**
                 * This is the 'suggest' version which builds a dropdown handled by select 2 for the corresponding relation.
                 * It should be used when there are a lot of records to filter.
                 */
                /*'parent_id' => [
                    'label'       => 'Parent page',
                    'type'        => 'suggest',
                    'model'       => 'article',
                    'value'       => 'id',
                    'caption'     => 'title',
                    'is_accessor' => 0,
                    'where'       => 'parent_id = 0',
                ],*/
                'title'   => ['type' => 'text', 'label' => 'title', 'field' => 'title'],
                'slug'    => ['type' => 'text', 'label' => 'slug', 'field' => 'slug'],
                'sort'    => ['type' => 'text', 'label' => 'sort', 'field' => 'sort'],
            ],
           'field_exportable' => [
                'id'     => ['type' => 'integer', 'field' => 'id', 'label' => 'id'],
                'parent' => ['type' => 'relation', 'relation' => 'parent', 'field' => 'title', 'label' => 'parent'],
                'title'  =>   ['type' => 'text', 'label' =>'Title' ,'field' => 'title' ],
                'slug'   =>   ['type' => 'text', 'label' =>'Slug' ,'field' => 'slug'],
                'sort'   =>   ['type' => 'text', 'label' =>'Sort' ,'field' => 'sort'],
            ],
            'joinTable'         => "article_translations",
			'foreignJoinKey'    => 'article_id',
            'localJoinKey'      => 'id',
            'whereFilter'       => 'locale="it" ',
            'orderBy'           => 'article_translations.title,sort',
            'orderType'         => 'ASC',
            'withRelation'      => ['translations','parent.translations'], // array
            'edit' => 1,
            'export_csv' => 1,
            'delete' => 1,
            'create' => 1,
            'copy' => 1,
            'preview' => 1,
            'view' => 0,
            'selectable' => 1,
            'showMedia' => 1,
            'showMediaCategory' => 0,
            'showMediaImages' => 1,
            'showMediaDoc' => 1,
            'showSeo' => 1,
            'menu' => [
                'home' => true,
                'top-bar' =>[
                    'show' => true,
                    'action' =>['add']
                ],
            ],
        ],

		'hpsliders' => [
			'model' => 'HpSlider',
			'title' => 'Home Sliders',
			'icon' => 'image',
			'fieldLabel' => 'ID,Image,Title,Pub,Sort,Created At,Updated At',
			'field' => [
				'id',
				'image' => ['type' => 'image', 'field' => 'image'],
				'title',
				'is_active' => ['type' => 'boolean', 'field' => 'is_active','editable' => true],
				'sort' => ['type' => 'editable', 'field' => 'sort'],
				'created_at' => ['type' => 'date', 'field' => 'created_at'],
				'updated_at' => ['type' => 'date', 'field' => 'updated_at'],
			],
			'edit' => 1,
			'orderBy' => 'sort',
			'orderType' => 'ASC',
			'delete' => 1,
			'create' => 1,
			'copy' => 1,
			'preview' => 0,
			'view' => 0,
			'selectable' => 1,
			'menu' => [
				'home' => true,
				'top-bar' =>[
					'show' => true,
					'action' =>['add']
				],
			],
		],

		'media' => [
			'model' => 'Media',
			'title' => 'Media',
			'icon' => 'files-o',
			'fieldLabel' => 'ID,Media,Title,Pub,Sort,Created At,Updated At',
			'field' => [
				'id',
				'image' => ['type' => 'image', 'field' => 'file_name'],
				'title',
				'pub' => ['type' => 'boolean', 'field' => 'pub', 'editable' => true],
				'sort' => ['type' => 'editable', 'field' => 'sort'],
				'created_at' => ['type' => 'date', 'field' => 'created_at'],
				'updated_at' => ['type' => 'date', 'field' => 'updated_at'],
			],
			'edit' => 1,
			'orderBy' => 'sort',
			'orderType' => 'ASC',
			'delete' => 1,
			'create' => 0,
			'copy' => 0,
			'preview' => 0,
			'view' => 0,
			'selectable' => 1,
			'menu' => [
				'home' => false,
				'top-bar' =>[
					'show' => false,
					'action' =>['add']
				],
			],
		],
		'news' => [
			'model' => 'News',
			'title' => 'News',
			'icon' => 'bullhorn',
			'fieldLabel' => 'ID,Date,Image,Title,Slug,Pub,Sort,Created At,Updated At',
			'field' => [
				'id',
				'date',
				'image' => ['type' => 'image', 'field' => 'image'],
				'title',
				'slug',
				'pub' => ['type' => 'boolean', 'field' => 'pub','editable' => true],
				'sort' => ['type' => 'editable', 'field' => 'sort'],
				'created_at' => ['type' => 'date', 'field' => 'created_at'],
				'updated_at' => ['type' => 'date', 'field' => 'updated_at'],
			],
			'export_csv' => 1,
			'field_exportable' => [
				'id'     => ['type'   => 'integer', 'field' => 'id', 'label' => 'id'],
				'date'   => ['type'   => 'text',  'field' => 'date', 'label' => 'date'],
				'title'  =>   ['type' => 'text', 'label' =>'Title' ,'field' => 'title' ],
				'slug'   =>   ['type' => 'text', 'label' =>'Slug' ,'field' => 'slug'],
				'sort'   =>   ['type' => 'text', 'label' =>'Sort' ,'field' => 'sort'],
				'created_at' => ['type' => 'datetime', 'label' => 'created_at', 'field' => 'created_at'],
			],
			'orderBy' => 'date',
			'orderType' => 'desc',
			'edit' => 1,
			'delete' => 1,
			'create' => 1,
			'copy' => 0,
			'preview' => 1,
			'view' => 0,
			'selectable' => 1,
			'showMedia'         => 1,
			'showMediaCategory' => 0,
			'showMediaImages'   => 1,
			'showMediaDoc'      => 0,
			'showSeo' => 1,
			'menu' => [
				'home' => true,
				'top-bar' =>[
					'show' => true,
					'action' =>['add']
				],
			],
		],
		'newsletters' => [
			'model' => 'Newsletter',
			'title' => 'Newsletter',
			'icon' => 'envelope',
			'fieldLabel' => 'ID,Email,Active,Created At',
			'field' => [
				'id',
				'email',
				'pub' => ['type' => 'boolean', 'field' => 'pub','editable' => true],
				'created_at' => ['type' => 'date', 'field' => 'created_at'],
			],
			'orderBy' => 'created_at',
			'orderType' => 'DESC',
			'edit' => 0,
			'delete' => 1,
			'create' => 0,
			'copy' => 0,
			'preview' => 0,
			'view' => 0,
			'selectable' => 1,
			'showMedia' => 0,
			'showSeo' => 0,
			'menu' => [
				'home' => false,
				'top-bar' =>[
					'show' => false,
				],
			],
		],
		'tags' => [
			'model' => 'Tag',
			'title' => 'TagsNews',
			'icon'  => 'tag',
			'fieldLabel' => 'ID,Title,Slug,Created At,Updated At',
			'field' => [
				'id',
				'title',
				'slug',
				'created_at' => ['type' => 'date', 'field' => 'created_at'],
				'updated_at' => ['type' => 'date', 'field' => 'updated_at'],
			],
			'edit' => 1,
			'delete' => 1,
			'create' => 1,
			'copy' => 0,
			'preview' => 0,
			'view' => 0,
			'selectable' => 1,
			'menu' => [
				'home' => false,
				'top-bar' =>[
					'show' => true,
					'action' =>['add']
				],
			],
		],

		'products' => [
			'model' => 'Product',
			'title' => 'Product',
			'icon' => 'cube',
			'fieldLabel' => 'ID,Category,Image,Title,Pub,Sort,Created At,Updated At',
			'field' => [
				'id',
				'category' => ['type' => 'relation', 'relation' => 'category', 'field' => 'title'],
				'image' => ['type' => 'image', 'field' => 'image'],
				'title',
				'pub' => ['type' => 'boolean', 'field' => 'pub','editable' => true],
				'sort' => ['type' => 'editable', 'field' => 'sort'],
				'created_at' => ['type' => 'date', 'field' => 'created_at'],
				'updated_at' => ['type' => 'date', 'field' => 'updated_at'],
			],
			'orderBy' => 'sort',
			'orderType' => 'ASC',
			'edit' => 1,
			'delete' => 1,
			'create' => 1,
			'copy' => 0,
			'preview' => 0,
			'view' => 0,
			'selectable' => 1,
			'showMedia' => 1,
			'showMediaCategory' => 0,
			'showMediaImages' => 1,
			'showMediaDoc' => 1,
			'showSeo' => 1,
			'menu' => [
				'home' => true,
				'top-bar' =>[
					'show' => true,
					'action' =>['add'],
					'submodel'  =>[
						'categories' => ['label' =>'Product Categories','model' =>'category','add'=>1 ],
						'productmodels'   => ['label' =>'Models','model' =>'productmodel','add'=>1 ]
					]
				],
			],
		],

		'categories' => [
			'model' => 'Category',
			'title' => 'Product Categories',
			'icon' => 'folder',
			'fieldLabel' => 'ID,Image,Title,Slug,Pub,Sort,Created At,Updated At',
			'field' => [
				'id',
				//'parent' => ['type' => 'relation', 'relation' => 'parentCategory', 'field' => 'title'],
				'image' => ['type' => 'image', 'field' => 'image'],
				'title',
				'slug',
				'pub' => ['type' => 'boolean', 'field' => 'pub','editable' => true],
				'sort' => ['type' => 'editable', 'field' => 'sort'],
				'created_at' => ['type' => 'date', 'field' => 'created_at'],
				'updated_at' => ['type' => 'date', 'field' => 'updated_at'],
			],
			'orderBy' => 'sort',
			'orderType' => 'ASC',
			'edit' => 1,
			'delete' => 1,
			'create' => 1,
			'copy' => 0,
			'preview' => 0,
			'view' => 0,
			'selectable' => 1,
			'showMedia' => 0,
			'showMediaImages' => 0,
			'showMediaDoc' => 0,
			'showSeo' => 1,
			'menu' => [
				'home' => false,
				'top-bar' =>[
					'show' => false,
					'action' =>['add']
				],
			],
		],

		'productmodels' => [
			'model' => 'ProductModel',
			'title' => 'Models',
			'icon' => 'folder',
			'fieldLabel' => 'ID,Image,Product,Model,Pub,Sort',
			'field' => [
				'id',
				'image'   => ['type' => 'image', 'field' => 'image'],
				'product' => ['type' => 'relation', 'field' => 'title',  'relation' => 'product'],
				'title',
				'pub' => ['type' => 'boolean', 'field' => 'pub','editable' => true],
				'sort' => ['type' => 'editable', 'field' => 'sort'],
			],
			'orderBy' => 'product_id',
			'orderType' => 'ASC',
			'edit' => 1,
			'delete' => 1,
			'create' => 1,
			'copy' => 0,
			'preview' => 0,
			'view' => 0,
			'selectable' => 1,
			'showMedia' => 0,
			'showSeo' => 0,
			'menu' => [
				'home' => false,
				'top-bar' =>[
					'show' => false,
					'action' =>['add']
				],
			],
		],

		'domains' => [
			'model' => 'Domain',
			'title' => 'Domain',
			'icon' => 'folder',
			'fieldLabel' => 'ID,Domain,Title,Value,Pub,Sort,Updated At',
			'field' => [
				'id',
				'domain',
				'title',
				'value' => ['type' => 'editable', 'field' => 'value'],
				'pub' => ['type' => 'boolean', 'field' => 'pub','editable' => true],
				'sort' => ['type' => 'editable', 'field' => 'sort'],
				'created_at' => ['type' => 'date', 'field' => 'created_at'],
				'updated_at' => ['type' => 'date', 'field' => 'updated_at'],
			],
			'orderBy' => 'domain',
			'orderType' => 'ASC',
			'edit' => 1,
			'delete' => 1,
			'create' => 1,
			'copy' => 1,
			'preview' => 0,
			'view' => 0,
			'selectable' => 1,
			'showMedia' => 0,
			'showSeo' => 0,
			'menu' => [
				'home' => false,
				'top-bar' =>[
					'show' => false,
					'action' =>['add']
				],
			],
		],

		'settings' => [
			'model' => 'Setting',
			'title' => 'Setting',
			'icon' => 'wrench',
			'fieldLabel' => 'ID,Domain,Key,Value,Description,Updated At',
			'field' => [
				'id',
				'domain',
				'key',
				'value' => ['type' => 'editable', 'field' => 'value'],
				'description' => ['type' => 'editable', 'field' => 'description'],
				'created_at' => ['type' => 'date', 'field' => 'created_at'],
				'updated_at' => ['type' => 'date', 'field' => 'updated_at'],
			],
			'orderBy' => '\'key\'',
			'orderType' => 'ASC',
			'edit' => 1,
			'delete' => 0,
			'create' => 1,
			'copy' => 0,
			'preview' => 0,
			'view' => 0,
			'selectable' => 1,
			'showMedia' => 0,
			'showSeo' => 0,
			'menu' => [
				'home' => false,
				'top-bar' =>[
					'show' => false,
					'action' =>['add']
				],
			],
		],
		'contacts' => [
			'model' => 'Contact',
			'icon'  => 'envelope',
			'title' => 'Info Request',
			'fieldLabel' => 'ID,Email,Name,Surname,Company,Message,Requested Product,Read,Created At,Updated At',
			'field' => [
				'id',
				'email'      => ['type' => 'text', 'field' => 'email'],
				'name'       => ['type' => 'text', 'field' => 'name'],
				'surname'    => ['type' => 'text', 'field' => 'surname'],
				'company'    => ['type' => 'text', 'field' => 'company'],
				'message'    => ['type' => 'text', 'field' => 'message'],
				'product' => ['type' => 'relation', 'relation' => 'product', 'field' => 'title'],
				'status'     => ['type' => 'boolean', 'field' => 'status','editable' => true],
				'created_at' => ['type' => 'date', 'field' => 'created_at'],
				'updated_at' => ['type' => 'date', 'field' => 'updated_at'],
			],
			'orderBy' => 'id',
			'orderType' => 'DESC',
			'edit' => 0,
			'delete' => 0,
			'create' => 0,
			'copy' => 0,
			'preview' => 0,
			'view' => 0,
			'selectable' => 0,
			'password' => 0,
			'menu' => [
				'home' => true,
				'top-bar' =>[
					'show' => true
				],
			]
		],
		'roles' => [
			'model' => 'Role',
			'icon' => 'graduation-cap',
			'title' => 'Roles',
			'fieldLabel' => 'ID,Name,DisplayName, Description,Created At,Updated At',
			'field' => [
				'id',
				'name' => ['type' => 'editable', 'field' => 'name'],
				'display_name' => ['type' => 'editable', 'field' => 'display_name'],
				'description' => ['type' => 'text', 'field' => 'description'],

				'created_at' => ['type' => 'date', 'field' => 'created_at'],
				'updated_at' => ['type' => 'date', 'field' => 'updated_at'],
			],
			'edit' => 1,
			'delete' => 1,
			'create' => 1,
			'copy' => 0,
			'preview' => 0,
			'view' => 0,
			'selectable' => 1
		],
		'socials' => [
			'model' => 'Social',
			'icon' => 'share-alt',
			'title' => 'Social',
			'fieldLabel' => 'ID,Social,Icon,Link,Active,Created At,Updated At',
			'field' => [
				'id',
				'title' => ['type' => 'editable', 'field' => 'title'],
				'icon'  => ['type' => 'editable', 'field' => 'icon'],
				'link'  => ['type' => 'editable', 'field' => 'link'],
				'is_active' => ['type' => 'boolean', 'field' => 'is_active','editable' => true],
				'created_at' => ['type' => 'date', 'field' => 'created_at'],
				'updated_at' => ['type' => 'date', 'field' => 'updated_at'],
			],
			'orderBy' => 'sort',
			'orderType' => 'ASC',
			'edit' => 1,
			'delete' => 1,
			'create' => 1,
			'copy' => 0,
			'preview' => 0,
			'view' => 0,
			'selectable' => 1,
			'menu' => [
				'home' => true,
			],
		],
		'users' => [
			'model' => 'User',
			'icon' => 'users',
			'title' => 'Users',
			'fieldLabel' => 'ID,Email,Name,Password,Active,Created At,Updated At',
			'field' => [
				'id',
				'email' => ['type' => 'editable', 'field' => 'email'],
				'name' => ['type' => 'editable', 'field' => 'name'],
				'real_password' => ['type' => 'text', 'field' => 'real_password'],
				'is_active' => ['type' => 'boolean', 'field' => 'is_active','editable' => true],
				'created_at' => ['type' => 'date', 'field' => 'created_at'],
				'updated_at' => ['type' => 'date', 'field' => 'updated_at'],
			],
			'field_searchable' => [
				'email'    => ['type' => 'text', 'label' => 'email', 'field' => 'email'],
				'name'   => ['type' => 'text', 'label' => 'name', 'field' => 'name'],
			],
			'orderBy' => 'name',
			'orderType' => 'ASC',
			'edit' => 1,
			'delete' => 1,
			'create' => 1,
			'copy' => 0,
			'preview' => 0,
			'view' => 0,
			'selectable' => 1,
			'password' => 1,
			'menu' => [
				'home' => true,
				'top-bar' =>[
					'show' => true,
					'action' =>['add']
				],
			],
			'roles' =>[
				'su',
				'admin',
			]
		],

		'orders' => [
			'model' => 'Order',
			'title' => 'Orders',
			'icon' => 'shopping-cart',
			'fieldLabel' => 'ID,Date,User,Products,Goods cost,Total,Payment,Transaction,Payment date,Paid',
			'field' => [
				'id',
				'created_at' => ['type' => 'date', 'field' => 'created_at', 'orderable' => true],
				'user_id'  => ['type' => 'text', 'field' => 'user_display', 'orderable' => true],
				'products'  => ['type' => 'text', 'field' => 'products_display', 'class' => 'text-left'],
				'products_cost'  => ['type' => 'text', 'field' => 'products_cost_display'],
				'total_cost'  => ['type' => 'text', 'field' => 'total_cost_display'],
				'payment'  => ['type' => 'text', 'field' => 'payment_method_display'],
				'payment_transaction' => ['type' => 'relation', 'relation' => 'payment', 'field' => 'transaction'],
				'payment_date' => ['type' => 'relation', 'relation' => 'payment', 'field' => 'created_at'],
				'paid' => ['type' => 'boolean', 'relation' => 'payment', 'model' => 'payment', 'field' => 'is_paid', 'editable' => true],
			],
			'orderBy'           => 'created_at',
			'orderType'         => 'DESC',
			'withRelation'      => ['payment'], // array
			'edit' => 0,
			'export_csv' => 0,
			'delete' => 0,
			'create' => 0,
			'copy' => 0,
			'preview' => 0,
			'view' => 0,
			'selectable' => 0,
			'showMedia' => 0,
			'showMediaCategory' => 0,
			'showMediaImages' => 0,
			'showMediaDoc' => 0,
			'showSeo' => 0,
			'menu' => [
				'home' => true,
				'top-bar' =>[
					'show' => true,
					'action' =>['add']
				],
			],
		],

		'paymentmethods' => [
			'model' => 'PaymentMethod',
			'title' => 'Payment Methods',
			'icon' => 'credit-card',
			'fieldLabel' => 'ID,Title,Code,Active',
			'field' => [
				'id',
				'title'  => ['type' => 'text', 'field' => 'title'],
				'code'   => ['type' => 'text', 'field' => 'code'],
				'is_active' => ['type' => 'boolean', 'field' => 'is_active'],
			],
			'orderBy'           => 'id',
			'orderType'         => 'ASC',
			'withRelation'      => [], // array
			'edit' => 1,
			'export_csv' => 0,
			'delete' => 0,
			'create' => 1,
			'copy' => 0,
			'preview' => 0,
			'view' => 0,
			'selectable' => 0,
			'showMedia' => 0,
			'showMediaCategory' => 0,
			'showMediaImages' => 0,
			'showMediaDoc' => 0,
			'showSeo' => 0,
			'menu' => [
				'home' => true,
				'top-bar' =>[
					'show' => true,
					'action' =>['add']
				],
			],
		],

		'adminusers' => [
			'model' => 'AdminUser',
			'icon' => 'users',
			'title' => 'Admin',
			'fieldLabel' => 'ID,Email,First Name,Last,Password,Active,Created At,Updated At',
			'field' => [
				'id',
				'email' => ['type' => 'editable', 'field' => 'email'],
				'first_name' => ['type' => 'editable', 'field' => 'first_name'],
				'last_name' => ['type' => 'editable', 'field' => 'last_name'],
				'real_password' => ['type' => 'text', 'field' => 'real_password'],
				'is_active' => ['type' => 'boolean', 'field' => 'is_active','editable' => true],
				'created_at' => ['type' => 'date', 'field' => 'created_at'],
				'updated_at' => ['type' => 'date', 'field' => 'updated_at'],
			],
			'orderBy' => 'first_name',
			'orderType' => 'ASC',
			'edit' => 1,
			'delete' => 1,
			'create' => 1,
			'copy' => 0,
			'preview' => 0,
			'view' => 0,
			'selectable' => 1,
			'password' => 1,
			'editTemplate' => 'admin.adminuser.edit',
			'menu' => [
				'tool' =>[
					'show' => true,
					'action' =>['add']
				],
			],
			'roles' =>[
				'su',
				'admin',
			]
		],

		'examples' => [
			'model' => 'Example',
			'title' => 'Example',
			'icon' => 'mortar-board',
			'fieldLabel' => 'ID,Article,Article 2,Image,Image from  Library,Title,Slug,Pub,Sort,Color,Status,Created At,Updated At',
			'field' => [
				'id',
				'article' => ['type' => 'relation', 'relation' => 'article', 'field' => 'title'],
				'article_2' => ['type' => 'relation', 'relation' => 'article_2', 'field' => 'title'],
				'image'  => ['type' => 'image', 'field' => 'image'],
				'image_media_id'  => ['type' => 'relation_image', 'relation'=>'imageMedia', 'field' => 'file_name'],
				'title'  => ['type' => 'text', 'field' => 'title','orderable'=>true],
				'slug'   => ['type' => 'text', 'field' => 'slug','orderable'=>true],
				'pub' => ['type' => 'boolean', 'field' => 'pub','orderable'=>true,'editable'=>false],
				'sort' => ['type' => 'editable', 'field' => 'sort', 'orderable'=>true],
				'color' => ['type' => 'color', 'field' => 'color'],

				'status_id'   =>  [
					'type'      => 'relation',
					'relation'  => 'statusType',
					'model'     => 'Domain',
					'filter'    =>  ['domain' => 'imagetype'],
					'foreign_key' => 'id',
					'label_key'   => 'title',
					'label_empty' => 'Seleziona Stato',
					'order_field' => 'sort',
					'field'     => 'status_id',
					'editable'  => true
				],
				'created_at' => ['type' => 'date', 'field' => 'created_at','orderable'=>true],
				'updated_at' => ['type' => 'date', 'field' => 'updated_at','orderable'=>true],
			],
			'field_searchable' => [
				/*
				* This is the 'relation' version which builds a dropdown input for the corresponding relation.
				* It should be only used when there are only a few records to show.
				*/
				'article_id' => [
					'label'    => 'article',
					'type'     => 'relation',
					'model'    => 'article',
					'relation' => 'article',
					'value'    => 'id',
					'field'    => 'title',
					'where'    => '1 = 1',
					'cssClass' => 'selectize',
				],
				/**
				* This is the 'suggest' version which builds a dropdown handled by select 2 for the corresponding relation.
				* It should be used when there are a lot of records to filter.
				*/
				'article_2_id' => [
					'label'       => 'Article 2',
					'type'        => 'suggest',
					'model'       => 'article',
					'value'       => 'id',
					'caption'     => 'title',
					'is_accessor' => 0,
					'where'       => '1 = 1',
				],
				'title'   => ['type' => 'text', 'label' => 'title', 'field' => 'title'],
				'slug'    => ['type' => 'text', 'label' => 'slug', 'field' => 'slug'],
				'sort'    => ['type' => 'text', 'label' => 'sort', 'field' => 'sort'],
			],
			'field_exportable' => [
				'id'     => ['type' => 'integer', 'field' => 'id', 'label' => 'id'],
				'parent' => ['type' => 'relation', 'relation' => 'parent', 'field' => 'title', 'label' => 'parent'],
				'title'  =>   ['type' => 'text', 'label' =>'Title' ,'field' => 'title' ],
				'slug'   =>   ['type' => 'text', 'label' =>'Slug' ,'field' => 'slug'],
				'sort'   =>   ['type' => 'text', 'label' =>'Sort' ,'field' => 'sort'],
			],
			'joinTable'         => "article_translations",
			'foreignJoinKey'    => 'article_id',
			'localJoinKey'      => 'id',
			'whereFilter'       => 'locale="it" ',
			'orderBy'           => 'article_translations.title,sort',
			'orderType'         => 'ASC',
			'withRelation'      => ['media'],
			'edit' => 1,
			'export_csv' => 1,
			'delete' => 1,
			'create' => 1,
			'copy' => 1,
			'preview' => 1,
			'view' => 0,
			'selectable' => 1,
			'showMedia' => 1,
			'showMediaCategory' => 0,
			'showMediaImages' => 1,
			'showMediaDoc' => 1,
			'showSeo' => 1,
			'menu' => [
				'home' => true,
				'top-bar' =>[
					'show' => true,
					'action' =>['add']
				],
			],
		],

		/************************  LOCALIZATION **********************/
		'countries' => [
			'model' => 'Country',
			'title' => 'Country',
			'icon' => 'folder',
			'fieldLabel' => 'ID,Country,ISO CODE,VAT%,Eu,Pub,Updated At',
			'field' => [
				'id',
				'name' => ['type' => 'editable', 'field' => 'name'],
				'iso_code' => ['type' => 'editable', 'field' => 'iso_code'],
				'vat' => ['type' => 'editable', 'field' => 'vat'],
				'eu' => ['type' => 'boolean', 'field' => 'eu'],
				'is_active' => ['type' => 'boolean', 'field' => 'is_active','editable' => true],
				'updated_at' => ['type' => 'date', 'field' => 'updated_at'],
			],
			'orderBy' => 'name',
			'orderType' => 'ASC',
			'edit' => 1,
			'delete' => 0,
			'create' => 1,
			'copy' => 0,
			'preview' => 0,
			'view' => 1,
			/* GF_ma  custom  view
			'editTemplate' =>'admin.special.edit_audit',
			'viewTemplate' =>'admin.special.view_audit',
			*/
			'selectable' => 1,
			'showMedia' => 0,
			'showSeo' => 0,
			'menu' => [
				'home' => false,
				'top-bar' =>[
					'show' => false,
					'action' =>['add']
				],
			],
			'roles' =>[
				'su',
			]
		],

		'provinces' => [
			'model' => 'Province',
			'icon' => 'flag',
			'title' => 'Province',
			'fieldLabel' => 'ID,State/Regione,Code,Name,Pub,Created At,Updated At',
			'field' => [
				'id',
				'state' => ['type' => 'relation', 'field' => 'title',  'relation' => 'state'],
				'code' => ['type' => 'editable', 'field' => 'code'],
				'title' => ['type' => 'editable', 'field' => 'title'],
				'pub' => ['type' => 'boolean', 'field' => 'pub','editable' => true],
				'created_at' => ['type' => 'date', 'field' => 'created_at'],
				'updated_at' => ['type' => 'date', 'field' => 'updated_at'],
			],
			'orderBy' => 'title',
			'orderType' => 'ASC',
			'edit' => 1,
			'delete' => 1,
			'create' => 1,
			'copy' => 0,
			'preview' => 0,
			'view' => 0,
			'selectable' => 1,
			'menu' => [
				'home' => false,
				'top-bar' =>[
					'show' => false,
					'action' =>['add']
				],
			],
			'roles' =>[
				'su',
			]
		],
		'states' => [
			'model' => 'State',
			'icon' => 'flag',
			'title' => 'State',
			'fieldLabel' => 'ID,Country,Name,Pub,Created At,Updated At',
			'field' => [
				'id',
				'country' => ['type' => 'relation', 'field' => 'name', 'relation' => 'country'],
				'title'   => ['type' => 'editable', 'field' => 'title'],
				'pub' => ['type' => 'boolean', 'field' => 'pub','editable' => true],
				'created_at' => ['type' => 'date', 'field' => 'created_at'],
				'updated_at' => ['type' => 'date', 'field' => 'updated_at'],
			],
			'orderBy' => 'title',
			'orderType' => 'ASC',
			'edit' => 1,
			'delete' => 1,
			'create' => 1,
			'copy' => 0,
			'preview' => 0,
			'view' => 0,
			'selectable' => 1,
			'menu' => [
				'home' => false,
				'top-bar' =>[
					'show' => false,
					'action' =>['add']
				],
			],
			'roles' =>[
				'su',
				'admin',
			]
		],
	],
];
