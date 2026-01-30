<?php

namespace App\Filament\Resources\FooterSettings\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FooterSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // About Section
                Section::make('About Section')
                    ->description('Informasi tentang perusahaan')
                    ->schema([
                        Textarea::make('about_text')
                            ->label('About Text')
                            ->rows(4)
                            ->placeholder('Pelopor ecoprint bordir dan ecoprint benang sulam...')
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

                // Boutique Location
                Section::make('Boutique Location')
                    ->description('Informasi lokasi boutique')
                    ->schema([
                        TextInput::make('boutique_name')
                            ->label('Boutique Name')
                            ->placeholder('Namira Ecoprint Boutique')
                            ->maxLength(255),

                        Textarea::make('address')
                            ->label('Address')
                            ->rows(4)
                            ->placeholder('Jl. Wisma Kedung Asem Indah G/7...')
                            ->columnSpanFull(),

                        TextInput::make('maps_url')
                            ->label('Google Maps URL')
                            ->url()
                            ->placeholder('https://goo.gl/maps/...')
                            ->helperText('Copy URL dari Google Maps'),
                    ])
                    ->columns(1)
                    ->columnSpanFull(),

                // Phone Numbers Repeater
                Section::make('Contact Numbers')
                    ->description('Nomor telepon dan WhatsApp')
                    ->schema([
                        Repeater::make('phones')
                            ->label('Phone Numbers')
                            ->schema([
                                TextInput::make('number')
                                    ->label('Phone Number')
                                    ->required()
                                    ->placeholder('0812 3537 106')
                                    ->columnSpan(2),

                                TextInput::make('label')
                                    ->label('Label')
                                    ->placeholder('WhatsApp / Office / Mobile')
                                    ->columnSpan(2),

                                TextInput::make('url')
                                    ->label('URL')
                                    ->url()
                                    ->placeholder('https://wa.me/6281235371106')
                                    ->helperText('Format: wa.me/628xxx atau tel:+628xxx')
                                    ->columnSpan(2),

                                Toggle::make('is_whatsapp')
                                    ->label('WhatsApp?')
                                    ->default(false)
                                    ->inline(false)
                                    ->columnSpan(2),
                            ])
                            ->columns(4)
                            ->defaultItems(0)
                            ->addActionLabel('Add Phone Number')
                            ->reorderable()
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['number'] ?? 'New Phone')
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull()
                    ->collapsible(),

                // Shop Locations Repeater
                Section::make('Shop Locations')
                    ->description('Lokasi dimana produk bisa ditemukan')
                    ->schema([
                        Repeater::make('shop_locations')
                            ->label('Locations')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Location Name')
                                    ->required()
                                    ->placeholder('Novotel Samator Surabaya')
                                    ->columnSpan(2),

                                Select::make('type')
                                    ->label('Type')
                                    ->options([
                                        'Hotel' => 'Hotel',
                                        'Gallery' => 'Gallery',
                                        'Store' => 'Store',
                                        'Restaurant' => 'Restaurant',
                                        'Other' => 'Other',
                                    ])
                                    ->default('Hotel')
                                    ->columnSpan(1),

                                TextInput::make('address')
                                    ->label('Address')
                                    ->placeholder('Jl. HR Muhammad No.1, Surabaya')
                                    ->columnSpan(3),

                                TextInput::make('url')
                                    ->label('URL')
                                    ->url()
                                    ->placeholder('https://goo.gl/maps/... atau website URL')
                                    ->helperText('Link Google Maps atau website')
                                    ->columnSpan(3),
                            ])
                            ->columns(3)
                            ->defaultItems(0)
                            ->addActionLabel('Add Location')
                            ->reorderable()
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['name'] ?? 'New Location')
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull()
                    ->collapsible(),

                // Online Stores Repeater
                Section::make('Online Stores')
                    ->description('Platform marketplace dan toko online')
                    ->schema([
                        Repeater::make('online_stores')
                            ->label('Stores')
                            ->schema([
                                Select::make('platform')
                                    ->label('Platform')
                                    ->options([
                                        'Tokopedia' => 'Tokopedia',
                                        'Shopee' => 'Shopee',
                                        'Bukalapak' => 'Bukalapak',
                                        'Lazada' => 'Lazada',
                                        'BliBli' => 'BliBli',
                                        'Website' => 'Website',
                                        'Other' => 'Other',
                                    ])
                                    ->required()
                                    ->searchable()
                                    ->columnSpan(1),

                                TextInput::make('name')
                                    ->label('Store Name')
                                    ->required()
                                    ->placeholder('Namira Ecoprint Official')
                                    ->columnSpan(2),

                                TextInput::make('url')
                                    ->label('Store URL')
                                    ->url()
                                    ->required()
                                    ->placeholder('https://tokopedia.com/namiraecoprint')
                                    ->columnSpan(3),
                            ])
                            ->columns(3)
                            ->defaultItems(0)
                            ->addActionLabel('Add Store')
                            ->reorderable()
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string =>
                                ($state['platform'] ?? '') . ' - ' . ($state['name'] ?? 'New Store')
                            )
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull()
                    ->collapsible(),

                // Social Media Repeater
                Section::make('Social Media')
                    ->description('Akun media sosial')
                    ->schema([
                        Repeater::make('social_media')
                            ->label('Social Media Accounts')
                            ->schema([
                                Select::make('platform')
                                    ->label('Platform')
                                    ->options([
                                        'Instagram' => 'Instagram',
                                        'Facebook' => 'Facebook',
                                        'TikTok' => 'TikTok',
                                        'Twitter' => 'Twitter',
                                        'YouTube' => 'YouTube',
                                        'LinkedIn' => 'LinkedIn',
                                        'Pinterest' => 'Pinterest',
                                        'Website' => 'Website',
                                    ])
                                    ->required()
                                    ->searchable()
                                    ->columnSpan(1),

                                TextInput::make('username')
                                    ->label('Username')
                                    ->required()
                                    ->placeholder('@namira.ecoprint')
                                    ->columnSpan(1),

                                TextInput::make('url')
                                    ->label('Profile URL')
                                    ->url()
                                    ->required()
                                    ->placeholder('https://instagram.com/namira.ecoprint')
                                    ->columnSpan(2),

                                TextInput::make('icon')
                                    ->label('Icon Class')
                                    ->placeholder('fa-instagram')
                                    ->helperText('Font Awesome icon (optional)')
                                    ->columnSpan(1),
                            ])
                            ->columns(5)
                            ->defaultItems(0)
                            ->addActionLabel('Add Social Media')
                            ->reorderable()
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string =>
                                ($state['platform'] ?? '') . ' - ' . ($state['username'] ?? 'New Account')
                            )
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull()
                    ->collapsible(),

                // Copyright
                Section::make('Copyright')
                    ->description('Teks copyright di bagian bawah')
                    ->schema([
                        TextInput::make('copyright_text')
                            ->label('Copyright Text')
                            ->placeholder('Made in Indonesia with Love. All rights reserved.')
                            ->maxLength(255)
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull()
                    ->collapsible(),
            ]);
    }
}