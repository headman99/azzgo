import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { MyfeedbackPage } from './myfeedback.page';

describe('MyfeedbackPage', () => {
  let component: MyfeedbackPage;
  let fixture: ComponentFixture<MyfeedbackPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MyfeedbackPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(MyfeedbackPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
