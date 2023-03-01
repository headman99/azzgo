import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { AgencyProfilePage } from './agency-profile.page';

describe('AgencyProfilePage', () => {
  let component: AgencyProfilePage;
  let fixture: ComponentFixture<AgencyProfilePage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AgencyProfilePage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(AgencyProfilePage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
