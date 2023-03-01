import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { IonicModule } from '@ionic/angular';

import { ThunderPage } from './thunder.page';

describe('ThunderPage', () => {
  let component: ThunderPage;
  let fixture: ComponentFixture<ThunderPage>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ThunderPage ],
      imports: [IonicModule.forRoot()]
    }).compileComponents();

    fixture = TestBed.createComponent(ThunderPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
