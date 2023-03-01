import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { AddaddrestorequestComponent } from './addaddrestorequest.component';

describe('AddaddrestorequestComponent', () => {
  let component: AddaddrestorequestComponent;
  let fixture: ComponentFixture<AddaddrestorequestComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AddaddrestorequestComponent ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(AddaddrestorequestComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
