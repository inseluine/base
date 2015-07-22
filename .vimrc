set tabstop=4
set expandtab
set shiftwidth=4
set autoindent

set encoding=utf-8
set fileencodings=utf-8,cp932,euc-jp

if &term == "screen"
    set t_ts=^[k
    set t_fs=^[\
    auto BufEnter * :set title | let &titlestring = expand('%')
    auto VimLeave * :set t_ts=
endif
if &term == "screen" || &term == "xterm"
  set title
endif
