import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { ManageActivePublisherPage } from './manage-active-publisher.page';

describe('ManageActivePublisherPage', () => {
  let component: ManageActivePublisherPage;
  let fixture: ComponentFixture<ManageActivePublisherPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ManageActivePublisherPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(ManageActivePublisherPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
