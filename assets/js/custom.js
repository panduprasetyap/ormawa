// import { Printd } from './printd.umd.min.js'
import { Printd } from 'printd'

class Mail {

  constructor() {
    $(document).on('click', '#button-print', this.printDocument);
  }

  printDocument() {
    const d     = new window.printd.d;
    const el    = $(document).find('#cetakDocument');

    const printCallback = ({ launchPrint }) => launchPrint();
    d.print(el, '', printCallback);
  }
}

new Mail();