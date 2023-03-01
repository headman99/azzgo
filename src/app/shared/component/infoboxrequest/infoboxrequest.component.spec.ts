import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { InfoboxrequestComponent } from './infoboxrequest.component';

describe('InfoboxrequestComponent', () => {
  let component: InfoboxrequestComponent;
  let fixture: ComponentFixture<InfoboxrequestComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ InfoboxrequestComponent ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(InfoboxrequestComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
