  export class QuestionBase<T> {
    value: T;
    key: string;
    label: string;
    required: boolean;
    order: number;
    hidden?:boolean;
    controlType: string;
    type: string;
    options: {key: string, value: string}[];
  
    constructor(options: {
        value?: T,
        key?: string,
        label?: string,
        required?: boolean,
        order?: number,
        controlType?: string,
        type?: string,
        hidden?:boolean
      } = {}) {
      this.value = options.value;
      this.key = options.key || '';
      this.label = options.label || '';
      this.required = !!options.required;
      this.order = options.order === undefined ? 1 : options.order;
      this.controlType = options.controlType || '';
      this.type = options.type || '';
      this.hidden = !!options.hidden;
    }
  }
  

  //
  export class Dropdown extends QuestionBase<string> {
    controlType = 'dropdown';
    options: {key: string, value: string}[] = [];
  
    constructor(options: {} = {}) {
      super(options);
      this.options = options['options'] || [];
    }
  }
  //


  export class Textbox extends QuestionBase<string> {
    controlType = 'textbox';
    type: string;
  
    constructor(options: {} = {}) {
      super(options);
      this.type = options['type'] || '';
    }
  }


  export class ImageBox extends QuestionBase<string> {
    controlType = 'imageUpload';
    type: string;
  
    constructor(options: {} = {}) {
      super(options);
      this.type = options['type'] || '';
    }
  }
  
  