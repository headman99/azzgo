import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { SignupAgencyPage } from './signup-agency.page';

describe('SignupAgencyPage', () => {
  let component: SignupAgencyPage;
  let fixture: ComponentFixture<SignupAgencyPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ SignupAgencyPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(SignupAgencyPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
