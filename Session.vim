let SessionLoad = 1
let s:so_save = &g:so | let s:siso_save = &g:siso | setg so=0 siso=0 | setl so=-1 siso=-1
let v:this_session=expand("<sfile>:p")
silent only
silent tabonly
cd ~/Projects/php-language-server-lsp
if expand('%') == '' && !&modified && line('$') <= 1 && getline(1) == ''
  let s:wipebuf = bufnr('%')
endif
set shortmess=aoO
badd +51 ~/Projects/php-language-server-lsp/bin/php-sense
badd +29 ~/Projects/php-language-server-lsp/composer.json
badd +9 ~/Projects/php-language-server-lsp/src/Events.php
badd +20 ~/Projects/php-language-server-lsp/src/Server.php
badd +1 ~/Projects/php-language-server-lsp/phpunit.xml
badd +2 src/Kernel/README.md
badd +1 LSP-3.16-notifications.md
badd +1 LSP-3.16-requests.md
badd +9 ~/Projects/php-language-server-lsp/src/Proc/Gateway.php
badd +2 vendor/felixfbecker/language-server-protocol/src/ClientCapabilities.php
badd +11 ~/Projects/php-language-server-lsp/README.md
badd +49 ~/Projects/php-language-server-lsp/createsClassFromJson.php
badd +13 ~/Projects/php-language-server-lsp/bin/php-sense-tinker
badd +1 ~/Projects/php-language-server-lsp/tests/DiodeTest
badd +26 ~/Projects/php-language-server-lsp/src/Diode.php
badd +12 ~/Projects/php-language-server-lsp/src/LSP/WorkDoneProgressParams.php
badd +19 ~/Projects/php-language-server-lsp/src/LSP/WorkspaceFolder.php
badd +20 ~/Projects/php-language-server-lsp/src/LSP/InitializeParams.php
badd +51 ~/Projects/php-language-server-lsp/src/LSP/DTO.php
badd +7 ~/Projects/php-language-server-lsp/src/LSP/ClientInfo.php
badd +2 ~/Projects/php-language-server-lsp/src/LSP/ClientCapabilities.php
badd +30 ~/Projects/php-language-server-lsp/tests/LSP/DTOTest.php
argglobal
%argdel
set stal=2
tabnew
tabnew
tabrewind
edit ~/Projects/php-language-server-lsp/tests/LSP/DTOTest.php
let s:save_splitbelow = &splitbelow
let s:save_splitright = &splitright
set splitbelow splitright
wincmd _ | wincmd |
vsplit
1wincmd h
wincmd w
let &splitbelow = s:save_splitbelow
let &splitright = s:save_splitright
wincmd t
let s:save_winminheight = &winminheight
let s:save_winminwidth = &winminwidth
set winminheight=0
set winheight=1
set winminwidth=0
set winwidth=1
exe 'vert 1resize ' . ((&columns * 30 + 69) / 139)
exe 'vert 2resize ' . ((&columns * 108 + 69) / 139)
argglobal
enew
file NvimTree
balt ~/Projects/php-language-server-lsp/src/LSP/InitializeParams.php
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal nofen
wincmd w
argglobal
balt ~/Projects/php-language-server-lsp/src/LSP/InitializeParams.php
setlocal fdm=indent
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal fen
9
normal! zo
10
normal! zo
24
normal! zo
let s:l = 30 - ((29 * winheight(0) + 24) / 49)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 30
normal! 033|
wincmd w
2wincmd w
exe 'vert 1resize ' . ((&columns * 30 + 69) / 139)
exe 'vert 2resize ' . ((&columns * 108 + 69) / 139)
tabnext
edit ~/Projects/php-language-server-lsp/src/LSP/DTO.php
let s:save_splitbelow = &splitbelow
let s:save_splitright = &splitright
set splitbelow splitright
wincmd _ | wincmd |
vsplit
1wincmd h
wincmd w
let &splitbelow = s:save_splitbelow
let &splitright = s:save_splitright
wincmd t
let s:save_winminheight = &winminheight
let s:save_winminwidth = &winminwidth
set winminheight=0
set winheight=1
set winminwidth=0
set winwidth=1
exe 'vert 1resize ' . ((&columns * 30 + 69) / 139)
exe 'vert 2resize ' . ((&columns * 108 + 69) / 139)
argglobal
enew
file NvimTree
balt ~/Projects/php-language-server-lsp/bin/php-sense
setlocal fdm=manual
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal nofen
wincmd w
argglobal
balt ~/Projects/php-language-server-lsp/src/Diode.php
setlocal fdm=indent
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal fen
13
normal! zo
25
normal! zo
29
normal! zo
let s:l = 51 - ((46 * winheight(0) + 24) / 49)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 51
normal! 05|
wincmd w
exe 'vert 1resize ' . ((&columns * 30 + 69) / 139)
exe 'vert 2resize ' . ((&columns * 108 + 69) / 139)
tabnext
edit vendor/felixfbecker/language-server-protocol/src/ClientCapabilities.php
argglobal
balt vendor/felixfbecker/language-server-protocol/src/ClientCapabilities.php
setlocal fdm=indent
setlocal fde=0
setlocal fmr={{{,}}}
setlocal fdi=#
setlocal fdl=99
setlocal fml=1
setlocal fdn=20
setlocal fen
let s:l = 1 - ((0 * winheight(0) + 24) / 49)
if s:l < 1 | let s:l = 1 | endif
keepjumps exe s:l
normal! zt
keepjumps 1
normal! 0
tabnext 1
set stal=1
if exists('s:wipebuf') && len(win_findbuf(s:wipebuf)) == 0&& getbufvar(s:wipebuf, '&buftype') isnot# 'terminal'
  silent exe 'bwipe ' . s:wipebuf
endif
unlet! s:wipebuf
set winheight=1 winwidth=20 shortmess=ifnTFItOolx
let s:sx = expand("<sfile>:p:r")."x.vim"
if filereadable(s:sx)
  exe "source " . fnameescape(s:sx)
endif
let &g:so = s:so_save | let &g:siso = s:siso_save
set hlsearch
doautoall SessionLoadPost
unlet SessionLoad
" vim: set ft=vim :
