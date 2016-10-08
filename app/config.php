<?php
namespace App;

return [
  'cookie'    => 'laravel_session=eyJpdiI6InJnV1wveVwvSVVFMHRrOHg5MTJYdDFzZz09IiwidmFsdWUiOiI2OXJFTStnbFRpZzlyTXdWSmZcL09IdVdwb1VOM1Bzd1RySWhWOXhtblwvVllvREpOR1ZBc01wb1NoNUZ3WnRJZDM5ZjNqbGJoRmxEYlpPXC9WbXlJKytwQT09IiwibWFjIjoiZmU0OWQ0YzBlNWJhNmFiYmM2MjY4ZWVmYWQwOGMwYTM4Nzc3OTVhMDk4ZjU3MGNjOTBmOThmYzQ1OWM4ZjM2ZiJ9; expires=Sat, 08-Oct-2016 17:53:40 GMT; Max-Age=7200; path=/; HttpOnly',
  // 存储目录必须保证 php 对该目录有写权限
  'save_path' => '/Users/misael/Desktop',
  // 代理设置。 如果没有代理留空即可
  'proxy'     => 'socks5h://127.0.0.1:6153',
];
